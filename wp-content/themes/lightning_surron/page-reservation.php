<?php
/*
Template Name: Reservation Page
*/
get_header(); ?>

<div class="min-h-screen bg-zinc-950 text-white font-sans selection:bg-yellow-500 selection:text-black py-24">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">仮予約</h1>
            <p class="text-zinc-400">
                以下のフォームより仮予約をお願いいたします。<br />
                内容を確認後、担当者よりご連絡させていただきます。
            </p>
        </div>

        <div class="mt-8">
            <?php echo do_shortcode('[contact-form-7 id="9d37c7f" title="仮予約"]'); ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo home_url(); ?>"
                class="text-zinc-500 hover:text-white transition-colors underline underline-offset-4">
                トップページに戻る
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>