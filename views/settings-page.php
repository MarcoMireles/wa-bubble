<div class="wrap wa-bubble-admin-container">
  <h1 class="title-wa-bubble"><?php echo esc_html(get_admin_page_title());?></h1>
  <?php
  $actve_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'wa_functions_options';
  ?>
  <h2 class="nav-tab-wrapper">
    <a href="?page=wa_bubble_admin&tab=wa_functions_options" class="nav-tab <?php echo $actve_tab == 'wa_functions_options' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Functions Options','wa-bubble') ?></a>
    <a href="?page=wa_bubble_admin&tab=wa_bubble_styles" class="nav-tab <?php echo $actve_tab == 'wa_bubble_styles' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Style Options','wa-bubble') ?></a>
  </h2>
  <form action="options.php" method="post">

    <?php
    if ($actve_tab == 'wa_functions_options'){
      settings_fields('wa_bubble_group');
      do_settings_sections('wa_bubble_page1');
    }else{
      settings_fields('wa_bubble_group2');
      do_settings_sections('wa_bubble_page2');
    }


    submit_button(esc_html__('Save Settings','wa-bubble'));

    ?>

  </form>
</div>