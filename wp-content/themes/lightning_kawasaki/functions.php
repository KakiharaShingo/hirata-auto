<?php
add_action('wp_enqueue_scripts', 'lightning_surron_scripts');
function lightning_surron_scripts()
{
    // Enqueue Tailwind CSS
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false);

    // Enqueue Lucide Icons
    wp_enqueue_script('lucide-icons', 'https://unpkg.com/lucide@latest', array(), null, false);

    // Custom script to initialize Lucide icons
    wp_add_inline_script('lucide-icons', 'window.addEventListener("DOMContentLoaded", () => lucide.createIcons());');

    // Config Tailwind to match design specifics
    wp_add_inline_script('tailwindcss', "
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
            colors: {
              zinc: {
                950: '#09090b',
                900: '#18181b',
                800: '#27272a',
                500: '#71717a',
                400: '#a1a1aa',
                300: '#d4d4d8',
              }
            }
          }
        }
      }
    ");
}
