<div class="wpm-6310">
   <div class="wpm-6310-sm">
      <?php
      $styleTemplate = 8;
      $numberOfWords = 12;
      include wpm_6310_plugin_url . 'settings/helper/team-member-save.php';

      if (!empty($_POST['update_style_change']) && $_POST['update_style_change'] == 'Save' && $_POST['styleid'] != '') {
         $nonce = $_REQUEST['_wpnonce'];
         if (!wp_verify_nonce($nonce, 'wpm_nonce_field_form')) {
            die('You do not have sufficient permissions to access this pagess.');
         } else {
            $css = "";
            $css .= sanitize_text_field($_POST['item_per_row']);
            $css .= "|";
            $css .= "|" . sanitize_text_field($_POST['image_radius']);
            $css .= "|" . sanitize_text_field($_POST['border_width']);
            $css .= "|" . sanitize_text_field($_POST['border_color']);
            $css .= "|";
            //0 - 5


            $css .= "|nai";
            $css .= "|" . sanitize_text_field($_POST['image_hover_background']);
            $css .= "|" . sanitize_text_field($_POST['box_shadow_width']);
            $css .= "|" . sanitize_text_field($_POST['box_shadow_blur']);
            $css .= "|" . sanitize_text_field($_POST['box_shadow_color']);
            //6 - 10

            $css .= "|" . sanitize_text_field($_POST['member_font_size']);
            $css .= "|" . sanitize_text_field($_POST['member_font_color']);
            $css .= "|";
            $css .= "|";
            $css .= "|" . sanitize_text_field($_POST['member_font_weight']);
            //11 - 15

            $css .= "|" . sanitize_text_field($_POST['member_text_transform']);
            $css .= "|" . sanitize_text_field($_POST['member_font_family']);
            $css .= "|" . sanitize_text_field($_POST['member_line_height']);
            $css .= "|" . sanitize_text_field($_POST['designation_font_size']);
            $css .= "|" . sanitize_text_field($_POST['designation_font_color']);
            //16 - 20
            $css .= "|" . sanitize_text_field($_POST['designation_font_weight']);
            $css .= "|" . sanitize_text_field($_POST['designation_text_transform']);
            $css .= "|" . sanitize_text_field($_POST['designation_font_family']);
            $css .= "|" . sanitize_text_field($_POST['designation_line_height']);
            $css .= "|";
            //21 - 25

            $css .= "|" . sanitize_text_field($_POST['social_icon_width']);
            $css .= "|" . sanitize_text_field($_POST['social_icon_height']);
            $css .= "|" . sanitize_text_field($_POST['social_border_width']);
            $css .= "|";
            $css .= "|" . sanitize_text_field($_POST['social_border_radius']);
            //26 - 30

            $css .= "|" . sanitize_text_field($_POST['box_background']);
            $css .= "|" . sanitize_text_field($_POST['member_font_hover_color']);
            $css .= "|" . (isset($_POST['social_activation']) ? sanitize_text_field($_POST['social_activation']) : 0);
            // 31 - 35


            include wpm_6310_plugin_url . 'settings/helper/slider_form_save.php';
         }
      }
      $styledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM $style_table WHERE id = %d ", $styleId), ARRAY_A);
      $allStyle = explode("|", $styledata['css']);
      $allSlider = explode("|", $styledata['slider']);
      $results = wpm_6310_extract_members($styledata['memberid'], $styleId);
      $members = $results['members'];
      $filterList = $results['filter_activation'];

    $rows = explode("@@##@@", $allStyle[0]);
    $desktop_row = $rows[0];
    $tablet_row = isset($rows[1]) ? $rows[1] : 1;
    $mobile_row = isset($rows[2]) ? $rows[2] : 1;
      ?>

      
         <div class="wpm_6310_tabs_panel_settings">
            <form method="post">
               <?php wp_nonce_field("wpm_nonce_field_form") ?>
               <input type="hidden" name="styleid" value="<?php echo $styleId ?>" />
               <div class="wpm_6310_padding_15_px">
                  <?php include wpm_6310_plugin_url . 'settings/helper/tab-menu.php'; ?>
               </div>
               <div class="wpm-tab-content">
                  <div id="tab-1">
                     <div class="row wpm_6310_padding_15_px">
                        <div class="wpm-col-6">
                           <table width="100%">
                              <tr height="45">
                                 <td width="55%"><b>Item Per Row</b></td>
                                 <td>
                                    <?php wpm_items_per_row($styleId, $allStyle[0]); ?>
                                    <input type="hidden" name="item_per_row" value="<?php echo $allStyle[0] ?>" />
                                    <table>
                                       <tr>
                                          <td width="60%" style="color: green;">
                                          <span class="btn btn-success btn-sm">
                                             <?php
                                             echo "Desktop: {$desktop_row}" . (($desktop_row > 1) ? " items" : " item");
                                             echo "<br>Tablet: {$tablet_row}" . (($tablet_row > 1) ? " items" : " item");
                                             echo "<br>Mobile: {$mobile_row}" . (($mobile_row > 1) ? " items" : " item");
                                             ?>
                                          </span>
                                          </td>
                                          <td> <span class="wpm-btn-success" id="wpm_items_per_row">Change</span></td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Items Alignment</b>
                                 <span class="wpm-6310-pro">(Pro) <div class='wpm-6310-pro-text'>This feature is available on the pro version only.</div></span>
                                 </td>
                                 <td>
                                    <select name="item_align" class="wpm-form-input" id="wpm_item_align">
                                       <option value="center" <?php if (!isset($allSlider[126]) || (isset($allSlider[126]) && $allSlider[126] == 'center')) echo " selected=''" ?>>Center</option>
                                       <option value="flex-start" <?php if (isset($allSlider[126]) && $allSlider[126] == 'flex-start') echo " selected=''" ?>>Left</option>
                                       <option value="flex-end" <?php if (isset($allSlider[126]) && $allSlider[126] == 'flex-end') echo " selected=''" ?>>Right</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr height="45">
                                    <td>
                          <b>Items Margin</b>
                          <span class="wpm-6310-pro">(Pro) <div class='wpm-6310-pro-text'>This feature is available on the pro version only.</div></span>
                          <div class="wpm-6310-pro">*Preview-on-change  not available</div>
                      </td>
                                    <td>
                                    <input type="text" name="item_margin" id="wpm_item_margin" class="wpm-form-input" value="<?php echo (isset($allSlider[127]) && $allSlider[127])?$allSlider[127]:"15" ?>">
                                    </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Box Radius</b></td>
                                 <td>
                                    <input type="number" min="0" name="image_radius" value="<?php echo $allStyle[2] ?>" class="wpm-form-input" id="wpm_image_radius" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Box Border Width</b></td>
                                 <td>
                                    <input type="number" min="0" name="border_width" value="<?php echo $allStyle[3] ?>" class="wpm-form-input" id="wpm_border_width" />
                                 </td>

                              </tr>
                              <tr height="45">
                                 <td><b>Box Border Color</b></td>
                                 <td>
                                    <input type="text" name="border_color" id="wpm_border_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allStyle[4] ?>">
                                 </td>

                              </tr>
                           </table>
                        </div>
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              <tr height="45">
                                 <td width="55%"><b>Box Background</b>
                                 <span class="wpm-6310-pro">(Pro) <div class='wpm-6310-pro-text'>This feature is available on the pro version only.</div></span>
                                 </td>
                                 <td>
                                    <input type="text" name="box_background" id="wpm_box_background"
                                    class="wpm-form-input wpm_6310_color_picker" data-opacity=".8" data-format="rgb"
                                    value="<?php echo (isset($allStyle[31]) && $allStyle[31] !== '') ? $allStyle[31] : 'rgba(255, 255, 255, 1)' ?>">
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width="55%"><b>Box Hover Background</b><?php                                  
                                                                              ?></td>
                                 <td>
                                    <input type="text" name="image_hover_background" id="wpm_image_hover_background" class="wpm-form-input wpm_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo $allStyle[7] ?>">
                                 </td>

                              </tr>
                              <tr height="45">
                                 <td><b>Box Shadow Width</b></td>
                                 <td>
                                    <input type="number" min="0" name="box_shadow_width" value="<?php echo $allStyle[8] ?>" class="wpm-form-input" step="1" id="wpm_box_shadow_width" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Box Shadow Blur</b></td>
                                 <td>
                                    <input type="number" min="0" name="box_shadow_blur" value="<?php echo $allStyle[9] ?>" class="wpm-form-input" step="1" id="wpm_box_shadow_blur" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Box Shadow Color</b></td>
                                 <td>
                                    <input type="text" name="box_shadow_color" id="wpm_box_shadow_color" class="wpm-form-input wpm_6310_color_picker" data-opacity=".8" data-format="rgb" value="<?php echo $allStyle[10] ?>">
                                 </td>

                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div id="tab-2">
                     <div class="row">
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              <tr height="45">
                                 <td width='55%'><b>Font Size</b></td>
                                 <td>
                                    <input type="number" min="0" name="member_font_size" value="<?php echo $allStyle[11] ?>" class="wpm-form-input" step="1" id="wpm_member_font_size" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Font Color</b></td>
                                 <td>
                                    <input type="text" name="member_font_color" id="wpm_member_font_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" value="<?php echo $allStyle[12] ?>">
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td>
                                    <b>Font Hover Color</b>
                                    <span class="wpm-6310-pro">(Pro) <div class='wpm-6310-pro-text'>This feature is available on the pro version only.</div></span>
                                 </td>
                                 <td>
                                    <input type="text" name="member_font_hover_color" id="wpm_member_font_hover_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" value="<?php echo (isset($allStyle[32]) && $allStyle[32] !== '') ? $allStyle[32] : $allStyle[12] ?>">
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width='55%'><b>Font Weight</b><?php                                  
                                                                     ?></td>
                                 <td>
                                    <select name="member_font_weight" class="wpm-form-input" id="wpm_member_font_weight">
                                       <option value="100" <?php if ($allStyle[15] == '100') echo " selected=''" ?>>100</option>
                                       <option value="200" <?php if ($allStyle[15] == '200') echo " selected=''" ?>>200</option>
                                       <option value="300" <?php if ($allStyle[15] == '300') echo " selected=''" ?>>300</option>
                                       <option value="400" <?php if ($allStyle[15] == '400') echo " selected=''" ?>>400</option>
                                       <option value="500" <?php if ($allStyle[15] == '500') echo " selected=''" ?>>500</option>
                                       <option value="600" <?php if ($allStyle[15] == '600') echo " selected=''" ?>>600</option>
                                       <option value="700" <?php if ($allStyle[15] == '700') echo " selected=''" ?>>700</option>
                                       <option value="800" <?php if ($allStyle[15] == '800') echo " selected=''" ?>>800</option>
                                       <option value="900" <?php if ($allStyle[15] == '900') echo " selected=''" ?>>900</option>
                                       <option value="normal" <?php if ($allStyle[15] == 'normal') echo " selected=''" ?>>Normal</option>
                                       <option value="bold" <?php if ($allStyle[15] == 'bold') echo " selected=''" ?>>Bold</option>
                                       <option value="lighter" <?php if ($allStyle[15] == 'lighter') echo " selected=''" ?>>Lighter</option>
                                       <option value="initial" <?php if ($allStyle[15] == 'initial') echo " selected=''" ?>>Initial</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width='55%'><b>Text Transform</b><?php                                  
                                                                        ?></td>
                                 <td>
                                    <select name="member_text_transform" class="wpm-form-input" id="wpm_member_text_transform">
                                       <option value="capitalize" <?php if ($allStyle[16] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                                       <option value="uppercase" <?php if ($allStyle[16] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                                       <option value="lowercase" <?php if ($allStyle[16] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                                       <option value="none" <?php if ($allStyle[16] == 'none') echo " selected=''" ?>>As Input</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              
                              <tr height="45">
                                 <td><b>Font Family</b><?php                                  
                                                         ?></td>
                                 <td>
                                    <input name="member_font_family" id="wpm_jquery_heading_font" type="text" value="<?php echo $allStyle[17] ?>" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Line Height</b></td>
                                 <td>
                                    <input name="member_line_height" id="wpm_heading_line_height" type="number" min="0" value="<?php echo $allStyle[18] ?>" class="wpm-form-input" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Margin Top</b>
                                 <span class="wpm-6310-pro">(Pro) <div class='wpm-6310-pro-text'>This feature is available on the pro version only.</div></span>
                                 </td>
                                 <td>
                                    <input name="member_margin_top" id="wpm_member_margin_top" type="number" value="<?php echo (isset($allSlider[41]) && $allSlider[41] !== '') ? $allSlider[41] : 38;?>" class="wpm-form-input" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width="55%"><b>Margin Bottom</b>
                                 <span class="wpm-6310-pro">(Pro) <div class='wpm-6310-pro-text'>This feature is available on the pro version only.</div></span>
                                 </td>
                                 <td>
                                    <input name="member_margin_bottom" id="wpm_member_margin_bottom" type="number" value="<?php echo (isset($allSlider[42]) && $allSlider[42] !== '') ? $allSlider[42] : 18;?>" class="wpm-form-input" />
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div id="tab-3">
                     <div class="row">
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              <tr height="45">
                                 <td width='55%'><b>Font Size</b></td>
                                 <td>
                                    <input type="number" min="0" name="designation_font_size" value="<?php echo $allStyle[19] ?>" class="wpm-form-input" step="1" id="wpm_designation_font_size" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Font Color</b></td>
                                 <td>
                                    <input type="text" name="designation_font_color" id="wpm_designation_font_color" class="wpm-form-input wpm_6310_color_picker" data-format="rgb" value="<?php echo $allStyle[20] ?>">
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width='55%'><b>Font Weight</b><?php                                  
                                                                     ?></td>
                                 <td>
                                    <select name="designation_font_weight" class="wpm-form-input" id="wpm_designation_font_weight">
                                       <option value="100" <?php if ($allStyle[21] == '100') echo " selected=''" ?>>100</option>
                                       <option value="200" <?php if ($allStyle[21] == '200') echo " selected=''" ?>>200</option>
                                       <option value="300" <?php if ($allStyle[21] == '300') echo " selected=''" ?>>300</option>
                                       <option value="400" <?php if ($allStyle[21] == '400') echo " selected=''" ?>>400</option>
                                       <option value="500" <?php if ($allStyle[21] == '500') echo " selected=''" ?>>500</option>
                                       <option value="600" <?php if ($allStyle[21] == '600') echo " selected=''" ?>>600</option>
                                       <option value="700" <?php if ($allStyle[21] == '700') echo " selected=''" ?>>700</option>
                                       <option value="800" <?php if ($allStyle[21] == '800') echo " selected=''" ?>>800</option>
                                       <option value="900" <?php if ($allStyle[21] == '900') echo " selected=''" ?>>900</option>
                                       <option value="normal" <?php if ($allStyle[21] == 'normal') echo " selected=''" ?>>Normal</option>
                                       <option value="bold" <?php if ($allStyle[21] == 'bold') echo " selected=''" ?>>Bold</option>
                                       <option value="lighter" <?php if ($allStyle[21] == 'lighter') echo " selected=''" ?>>Lighter</option>
                                       <option value="initial" <?php if ($allStyle[21] == 'initial') echo " selected=''" ?>>Initial</option>
                                    </select>
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              <tr height="45">
                                 <td width='55%'><b>Text Transform</b><?php                                  
                                                                        ?></td>
                                 <td>
                                    <select name="designation_text_transform" class="wpm-form-input" id="wpm_designation_text_transform">
                                       <option value="capitalize" <?php if ($allStyle[22] == 'capitalize') echo " selected=''" ?>>Capitalize</option>
                                       <option value="uppercase" <?php if ($allStyle[22] == 'uppercase') echo " selected=''" ?>>Uppercase</option>
                                       <option value="lowercase" <?php if ($allStyle[22] == 'lowercase') echo " selected=''" ?>>Lowercase</option>
                                       <option value="none" <?php if ($allStyle[22] == 'none') echo " selected=''" ?>>As Input</option>
                                    </select>
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Font Family</b><?php                                  
                                                         ?></td>
                                 <td>
                                    <input name="designation_font_family" id="wpm_jquery_designation_font" type="text" value="<?php echo $allStyle[23] ?>" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Line Height</b></td>
                                 <td>
                                    <input name="designation_line_height" id="wpm_designation_line_height" type="number" min="0" value="<?php echo $allStyle[24] ?>" class="wpm-form-input" />
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div id="tab-4">
                     <div class="row">
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              <tr height="45">
                                 <td width="55%">
                                    <b>Display Social Icons</b>
                                 </td>
                                 <td>
                                    <label class="switch" for="wpm_social_activation">
                                    <input type="checkbox" name="social_activation" id="wpm_social_activation" value="1" <?php echo (!isset($allStyle[33]) || (isset($allStyle[33]) && $allStyle[33])) ? 'checked' : '' ?>>
                                    <span class="slider round"></span>
                                    </label>
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width='55%'><b>Social Icon Number</b></td>
                                 <td>
                                    <select name="social_icon_number" id="social_icon_number" class="wpm-form-input">
                                    
                                    <?php
                                    for ($i = 1; $i <= 9; $i++) {
                                       $items = $i == 1 ? ' item':' items';
                                       if (!isset($allSlider[63]) && $i == 4) {
                                          echo "<option selected value='{$i}'>{$i}{$items}</option>";
                                       }
                                       else if (isset($allSlider[63]) && $allSlider[63] == $i) {
                                          echo "<option selected value='{$i}'>{$i}{$items}</option>";
                                       }
                                       else {
                                          echo "<option value='{$i}'>{$i}{$items}</option>";
                                       }
                                    }
                                    ?>
                                    </select>
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width='55%'><b>Social Icon Width</b><?php                                  
                                                                           ?></td>
                                 <td>
                                    <input type="number" min="0" name="social_icon_width" value="<?php echo $allStyle[26] ?>" class="wpm-form-input" id="wpm_social_icon_width" />
                                 </td>
                              </tr>
                           </table>
                        </div>
                        <div class="wpm-col-6">
                           <table class="table table-responsive wpm_6310_admin_table">
                              <tr height="45">
                                 <td><b>Social Icon Height</b><?php                                  
                                                               ?></td>
                                 <td>
                                    <input type="number" min="0" name="social_icon_height" value="<?php echo $allStyle[27] ?>" class="wpm-form-input" id="wpm_social_icon_height" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td width="55%"><b>Social Icon Border Width</b><?php                                  
                                                                                 ?></td>
                                 <td>
                                    <input type="number" min="0" name="social_border_width" value="<?php echo $allStyle[28] ?>" class="wpm-form-input" id="wpm_social_border_width" />
                                 </td>
                              </tr>
                              <tr height="45">
                                 <td><b>Social Icon Border Radius</b></td>
                                 <td>
                                    <input type="number" min="0" name="social_border_radius" value="<?php echo $allStyle[30] ?>" class="wpm-form-input" id="wpm_social_border_radius" />
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
                  <?php include wpm_6310_plugin_url . 'settings/helper/slider_form.php'; 
              include wpm_6310_plugin_url . 'settings/helper/search_form.php'; 
              include wpm_6310_plugin_url . 'settings/helper/category_form.php';  ?>
                  <br class="wpm-6310-clear" />
                  <br class="wpm-6310-clear" />
                  <hr />
                  <input type="submit" name="update_style_change" value="Save" class="wpm-btn-primary wpm-pull-right" style="margin-right: 15px; margin-bottom: 10px; display: block" />
                  <br class="wpm-6310-clear" />
               </div>
            </form>
         </div>

         <style type="text/css">
         .wpm_6310_tabs_panel_preview .wpm-6310-row {
            justify-content: <?php echo (isset($allSlider[126]) && $allSlider[126] !== '') ? $allSlider[126] : 'center' ?> !important;
         }
            .wpm_6310_team_style_08 {
               box-sizing: border-box;
               text-align: center;
               overflow: hidden;
               padding: 20px 15px 0;
               transition: all 0.3s ease 0s;
               -webkit-border-radius: <?php echo $allStyle[2] ?>px;
               -o-border-radius: <?php echo $allStyle[2] ?>px;
               -moz-border-radius: <?php echo $allStyle[2] ?>px;
               -ms-border-radius: <?php echo $allStyle[2] ?>px;
               border-radius: <?php echo $allStyle[2] ?>px;
               border-style: solid;
               border-width: <?php echo $allStyle[3] ?>px;
               border-color: <?php echo $allStyle[4] ?>;
               box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
               -moz-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
               -o-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
               -webkit-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
               -ms-box-shadow: 0 0 <?php echo $allStyle[9] ?>px <?php echo $allStyle[8] ?>px <?php echo $allStyle[10] ?>;
               height: 100%;
               background-color: <?php echo (isset($allStyle[31]) && $allStyle[31] !== '') ? $allStyle[31] : 'rgba(255, 255, 255, 1)' ?>;
            }

            .wpm_6310_team_style_08_pic, .wpm_6310_team_style_08_team_content{
               float: left;
               width: 100%;
            }
            .wpm_6310_team_style_08,
            .wpm_6310_team_style_08_pic img {
               transition: all 0.3s ease 0s;
            }

            .wpm_6310_team_style_08_pic img {
               border: 10px solid #f8f8f8;
               border-radius: 50%;
               transition: all 0.3s ease 0s;
               width: calc(100% - 20px) !important;
               height: auto;
               float: left;
            }

            .wpm_6310_team_style_08_title {
               float: left;
               width: 100%;
               margin-top: <?php echo (isset($allSlider[41]) && $allSlider[41] !== '') ? $allSlider[41]:38;?>px;
               margin-bottom: <?php echo (isset($allSlider[42]) && $allSlider[42] !== '') ? $allSlider[42]:18;?>px;
               position: relative;
               font-size: <?php echo $allStyle[11] ?>px;
               color: <?php echo $allStyle[12] ?>;
               font-weight: <?php echo $allStyle[15] ?>;
               text-transform: <?php echo $allStyle[16]; ?>;
               font-family: <?php echo str_replace("+", " ", $allStyle[17]); ?>;
               line-height: <?php echo $allStyle[18] ?>px;
            }

            .wpm_6310_team_style_08_border {
               position: relative;
               left: 50%;
               float: left;
               width: 100px;
               border-bottom: 3px solid #37cfd7;
               display: block;
               margin: 0;
               transition: all 0.3s ease 0s;
               transform: translateX(-50%);
            }

            .wpm_6310_team_style_08_border:after {
               content: "";
               width: 34px;
               display: block;
               position: relative;
               top: 3px;
               border-bottom: 3px solid #F43662;
               margin: auto;
            }

            .wpm_6310_team_style_08_designation {
               float: left;
               width: 100%;
               margin-top: 30px;
               margin-bottom: 0px;
               overflow: hidden;
               display: block;
               font-size: <?php echo $allStyle[19] ?>px;
               color: <?php echo $allStyle[20] ?>;
               font-weight: <?php echo $allStyle[21] ?>;
               text-transform: <?php echo $allStyle[22] ?>;
               font-family: <?php echo str_replace("+", " ", $allStyle[23]); ?>;
               line-height: <?php echo ($allStyle[24] + 15) ?>px;
               opacity: 1;
               transition: all 0.3s ease 0s;
            }

            ul.wpm_6310_team_style_08_social {
               display: <?php echo (!isset($allStyle[33]) || (isset($allStyle[33]) && $allStyle[33])) ? 'block':'none'?>;
               float: left;
               width: 100%;
               list-style: none;
               padding: 0;
               text-align: center;
               position: relative;
               bottom: -100px;
               opacity: 0;
               margin: <?php echo (isset($allSlider[61]) && $allSlider[61] !== '') ? $allSlider[61]:0;?>px 0 <?php echo (isset($allSlider[62]) && $allSlider[62] !== '') ? $allSlider[62]:0;?>px;
            }

            ul.wpm_6310_team_style_08_social li {
               display: inline-block;
               margin: 0 8px 8px 0;
            }

            ul.wpm_6310_team_style_08_social li:last-child {
               margin-right: 0;
            }

            ul.wpm_6310_team_style_08_social li a {
               display: inline-block;
               font-size: 15px;
               transition: all 0.3s ease 0s;
               width: <?php echo $allStyle[26] ?>px;
               height: <?php echo $allStyle[27] ?>px;
               line-height: <?php echo $allStyle[27] ?>px;
               font-size: <?php echo ceil(($allStyle[26] + $allStyle[27]) / 4) ?>px;
               border-radius: <?php echo $allStyle[30] ?>%;
               -moz-border-radius: <?php echo $allStyle[30] ?>%;
               -webkit-border-radius: <?php echo $allStyle[30] ?>%;
               -o-border-radius: <?php echo $allStyle[30] ?>%;
               -ms-border-radius: <?php echo $allStyle[30] ?>%;
            }

            .wpm_6310_team_style_08:hover {
               background: <?php echo $allStyle[7] ?>;
               margin-bottom: 30px;
            }

            .wpm_6310_team_style_08:hover .wpm_6310_team_style_08_pic img {
               border-color: <?php echo $allStyle[4]; ?>;
            }

            .wpm_6310_team_style_08:hover .wpm_6310_team_style_08_border {
               border-color: #F43662;
            }

            .wpm_6310_team_style_08:hover .wpm_6310_team_style_08_border:after {
               border-color: #fff;
            }

            .wpm_6310_team_style_08:hover .wpm_6310_team_style_08_designation {
               margin-top: 0;
               margin-bottom: 0;
               opacity: 0;
            }

            .wpm_6310_team_style_08:hover .wpm_6310_team_style_08_social {
               opacity: 1;
               bottom: 0;
            }
            .wpm-6310-owl-carousel .wpm-6310-owl-stage-outer{
               padding-bottom: 10px !important;
            }
         </style>

         <?php
         include wpm_6310_plugin_url . 'settings/helper/template-08.php';
         ?>
         <div class="wpm-plugin-setting-left">
      <div class="wpm-preview-box">
            <div class="wpm-6310-preview">
               Preview
               <div style="display: inline; float: right">
                  <input type="text" id="wpm_background_preview" class="wpm-form-input  wpm-pull-right wpm_6310_color_picker wpm_preview_color_chooser" data-format="rgb" data-opacity=".8" value="rgba(255, 255, 255, .8)"></div>
            </div>
            <hr />
         </div>
         <div class="wpm_6310_tabs_panel_preview">
            <div id="wpm-6310-noslider-<?php echo $styleId ?>">
               <?php
               wpm_6310_search_template($template_id, $allSlider, $desktop_row); 
               wpm_6310_category_menu($categoryData, $styleId);

               if ($members) {
                  echo "<div class='wpm-6310-row c-1588100157'>";
                  foreach ($members as $value) {
                     if ($value['profile_details_type'] == 1) {
                        $link_type = " class='wpm_6310_team_style_08 wpm_6310_team_member_info' link-id='{$value['id']}' link-url='".wpm_6310_validate_profile_url($value['profile_url'])."' target='{$value['open_new_tab']}' team-id='0'";
                     } else if ($value['profile_details_type'] == 2) {
                        $link_type = " class='wpm_6310_team_style_08 wpm_6310_team_member_info' link-id='0' team-id='{$value['id']}'";
                     } else {
                        $link_type = " class='wpm_6310_team_style_08' link-id='0' team-id='0'";
                     }
               ?>
                     <div class="wpm-6310-col-<?php echo $desktop_row; ?>">
                        <div<?php echo $link_type ?>>
                           <div class="wpm_6310_team_style_08_pic">
                              <img src="<?php echo $value['image'] ?>" class="img-responsive <?php echo $allStyle[1] ?>" alt="<?php echo $value['name'] ?>">
                           </div>
                           <div class="wpm_6310_team_style_08_team_content">
                              <h3 class="wpm_6310_team_style_08_title"><?php echo $value['name'] ?></h3>
                              <div class="wpm_6310_team_style_08_border"></div>
                              <span class="wpm_6310_team_style_08_designation"><?php echo $value['designation'] ?></span>
                              <?php
                                 wpm_6310_extract_contact_info(isset($value['contact_info']) ? $value['contact_info'] : '', $styleId);
                                 echo wpm_6310_extract_member_description($value['profile_details'], ((isset($allSlider[72]) && $allSlider[72] !== '') ? $allSlider[72] : $numberOfWords), $styleId);
                                 wpm_6310_social_icon($value['iconids'], $value['iconurl'], $allStyle[28], $value['id'], $template_id, '', '', isset($allSlider['63']) ? $allSlider['63'] : 4);
                              ?>
                           </div>
                     </div>
            </div>
      <?php
                  }
                  echo "</div>";
               }
               if($filterList){
                  foreach($filterList as $filterKey => $filterValue){
                    $returnMember = wpm_6310_extract_members($filterValue);
                    $catMembers = $returnMember['members'];
                    if ($catMembers) {
                     echo "<div class='wpm-6310-row {$filterKey}' style='display: none'>";
                     foreach ($catMembers as $value) {
                        if ($value['profile_details_type'] == 1) {
                           $link_type = " class='wpm_6310_team_style_08 wpm_6310_team_member_info' link-id='{$value['id']}' link-url='".wpm_6310_validate_profile_url($value['profile_url'])."' target='{$value['open_new_tab']}' team-id='0'";
                        } else if ($value['profile_details_type'] == 2) {
                           $link_type = " class='wpm_6310_team_style_08 wpm_6310_team_member_info' link-id='0' team-id='{$value['id']}'";
                        } else {
                           $link_type = " class='wpm_6310_team_style_08' link-id='0' team-id='0'";
                        }
                  ?>
                        <div class="wpm-6310-col-<?php echo $desktop_row; ?>">
                           <div<?php echo $link_type ?>>
                              <div class="wpm_6310_team_style_08_pic">
                                 <img src="<?php echo $value['image'] ?>" class="img-responsive <?php echo $allStyle[1] ?>" alt="<?php echo $value['name'] ?>">
                              </div>
                              <div class="wpm_6310_team_style_08_team_content">
                                 <h3 class="wpm_6310_team_style_08_title"><?php echo $value['name'] ?></h3>
                                 <div class="wpm_6310_team_style_08_border"></div>
                                 <span class="wpm_6310_team_style_08_designation"><?php echo $value['designation'] ?></span>
                                 <?php
                                    wpm_6310_extract_contact_info(isset($value['contact_info']) ? $value['contact_info'] : '', $styleId);
                                    echo wpm_6310_extract_member_description($value['profile_details'], ((isset($allSlider[72]) && $allSlider[72] !== '') ? $allSlider[72] : $numberOfWords), $styleId);
                                    wpm_6310_social_icon($value['iconids'], $value['iconurl'], $allStyle[28], $value['id'], $template_id, '', '', isset($allSlider['63']) ? $allSlider['63'] : 4);
                                 ?>
                              </div>
                        </div>
               </div>
         <?php
                     }
                     echo "</div>";
                  }
                  }
               }
      ?>
         </div>

         <div class="carousel">
            <div id="wpm-6310-slider-<?php echo $styleId ?>" class="wpm-6310-owl-carousel">
               <?php
               if ($members) {
                  foreach ($members as $value) {
                     if ($value['profile_details_type'] == 1) {
                        $link_type = " class='wpm_6310_team_style_08 wpm_6310_team_member_info' link-id='{$value['id']}' link-url='".wpm_6310_validate_profile_url($value['profile_url'])."' target='{$value['open_new_tab']}' team-id='0'";
                     } else if ($value['profile_details_type'] == 2) {
                        $link_type = " class='wpm_6310_team_style_08 wpm_6310_team_member_info' link-id='0' team-id='{$value['id']}'";
                     } else {
                        $link_type = " class='wpm_6310_team_style_08' link-id='0' team-id='0'";
                     }
               ?>
                     <div class="wpm-6310-item">
                        <div <?php echo $link_type ?>>
                           <div class="wpm_6310_team_style_08_pic">
                              <img src="<?php echo $value['image'] ?>" class="img-responsive <?php echo $allStyle[1] ?>" alt="<?php echo $value['name'] ?>">
                           </div>
                           <div class="wpm_6310_team_style_08_team_content">
                              <h3 class="wpm_6310_team_style_08_title"><?php echo $value['name'] ?></h3>
                              <div class="wpm_6310_team_style_08_border"></div>
                              <span class="wpm_6310_team_style_08_designation"><?php echo $value['designation'] ?></span>
                              <?php
                                 wpm_6310_extract_contact_info(isset($value['contact_info']) ? $value['contact_info'] : '', $styleId);
                                 echo wpm_6310_extract_member_description($value['profile_details'], ((isset($allSlider[72]) && $allSlider[72] !== '') ? $allSlider[72] : $numberOfWords), $styleId);
                                 wpm_6310_social_icon($value['iconids'], $value['iconurl'], $allStyle[28], $value['id'], $template_id, '', '', isset($allSlider['63']) ? $allSlider['63'] : 4);
                              ?>
                           </div>
                        </div>
                     </div>
               <?php
                  }
               }
               ?>
            </div>
         </div>
      </div>
      <br />

   </div>
   <div class="wpm-plugin-setting-right">
      <?php wpm_6310_add_new_media($styleId, $member_table, $icon_table, $styledata['memberid']) ?>
   </div>
</div>
</div>
<?php wpm_6310_modal_settings_for_member_description($loading); ?>