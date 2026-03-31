#!/bin/bash
# deploy.sh - テーマ変更を本番に自動デプロイ
# 使い方: ./deploy.sh [surron|kawasaki|all] "コミットメッセージ"

set -e

THEMES_DIR="$(dirname "$0")/wp-content/themes"
MESSAGE="${2:-更新}"

deploy_theme() {
    local theme_dir="$1"
    local theme_name="$(basename "$theme_dir")"

    if [ ! -d "$theme_dir/.git" ]; then
        echo "  ⚠ $theme_name: gitリポジトリが見つかりません。スキップ"
        return
    fi

    cd "$theme_dir"

    # 変更があるか確認
    if git diff --quiet && git diff --cached --quiet && [ -z "$(git ls-files --others --exclude-standard)" ]; then
        echo "  ✓ $theme_name: 変更なし"
        return
    fi

    echo "  → $theme_name: 変更を検出、デプロイ中..."
    git add -A
    git commit -m "$MESSAGE"
    git push origin main
    echo "  ✓ $theme_name: デプロイ完了!"
}

echo "=== デプロイ開始 ==="

case "${1:-all}" in
    surron)
        deploy_theme "$THEMES_DIR/lightning_surron"
        ;;
    kawasaki)
        deploy_theme "$THEMES_DIR/lightning_kawasaki"
        ;;
    all)
        deploy_theme "$THEMES_DIR/lightning_surron"
        deploy_theme "$THEMES_DIR/lightning_kawasaki"
        ;;
    *)
        echo "使い方: ./deploy.sh [surron|kawasaki|all] \"コミットメッセージ\""
        exit 1
        ;;
esac

echo "=== デプロイ完了 ==="
echo ""
echo "※ WP Pusherが設定済みなら、数秒後に本番に自動反映されます"
echo "※ 手動反映: WP管理画面 → WP Pusher → テーマ → Update Theme"
