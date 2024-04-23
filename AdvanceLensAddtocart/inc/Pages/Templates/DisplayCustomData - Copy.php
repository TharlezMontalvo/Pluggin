<?php 
/**
 * @package  WooCommemrce Advanced Lens
 */
 
namespace Inc\Pages\Templates;

class DisplayCustomData{
	
	public function register(){
	?>
	<head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	</head>
	<div id="button_here"></div>
	<?php
	}
	
	public function display_popup_in_footer(){
	?>
	
	<div class="container_popup">
    	<div class="container">

            <div role="wizard_panel">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ul wizard_panel_content_list id="ul_content_list">
                        <li id="usage_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Usage</span>
                        </li>
                        <li id="prescription_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Prescription</span>
                        </li>
                        <li id="lens_type_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Lens Type</span>
                        </li>
                        <li id="lens_option_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Lens Option</span>
                        </li>
                    </ul>

					<div id="infinite-scroll" class="content">
						<div role="wizard_panel_content__holder" class="carousel-inner">
							<div role="wizard_panel_content" id="usage_div_box" class="itemCarousel active">
								<div role="wizard_panel_content_box_hodler">
								
										<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>If your prescription has a negative ( - ) number and 0 ADD, this means that you need "Distance" lenses. Distance lenses are needed when things up close appear clear, while things further away look blurry. This is called nearsightedness, or myopia. Reading (Opens the second stage "Prescription" with the ability to edit fields with the title "ADD")</div>
										</a>
										<div role="wizard_panel_content_box">
											<div class="wizard_panel_contentBbox right carousel-control" id="usage_distance" >
												
													<div role="option-title">
														<span option-name>DISTANCE</span>
														<a class="social-icon social-icon--github">
														<i class="fa fa-info" aria-hidden="true"></i>
														<div tooltip-design-2>If your prescription has a negative ( - ) number and 0 ADD, this means that you need "Distance" lenses. Distance lenses are needed when things up close appear clear, while things further away look blurry. This is called nearsightedness, or myopia. Reading (Opens the second stage "Prescription" with the ability to edit fields with the title "ADD")</div>
													</a>
													</div>
														
												
												<div role="wizard_panel_content_box_img_box">
													<div img-box> <i class="im-rx im-rx-distance"></i> </div>
													<div text-box>
														<p option-intro>General use lenses for seeing things far away </p>
													</div>
												</div>
												<input type="radio" />
											</div>
											
										</div>
								
								
											
											<div role="wizard_panel_content_box">
												<div class="wizard_panel_contentBbox" id="usage_reading">
													
														<div role="option-title">
															<span option-name>READING</span>
														</div>
														<a class="social-icon social-icon--github">
														<i class="fa fa-info" aria-hidden="true"></i>
															<div tooltip-design-2>"Reader" and "Intermediate" lenses have prescriptions starting with a plus ( + ) sign and are designed for those who have trouble focusing their eyes while reading. These lenses are designed to help correct farsightedness caused by hyperopia or presbyopia.</div>
														</a>
														
													
													<div role="wizard_panel_content_box_img_box">
														<div img-box> <i class="im-rx im-rx-reading"></i> </div>
														<div text-box>
															<p option-intro>General use lenses for seeing things up close </p>
														</div>
													</div>
													<input type="radio" />
												</div>
												<div class="event_rx__rx_option" id="usage_reading_readers">
													<span sub-option-name>READERS</span>
												</div>
												<div class="event_rx__rx_option"id="usage_reading_intermediate">
													<span sub-option-name>INTERMEDIATE</span>
												</div>
											</div>
									
									
										
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox right carousel-control" id="usage_multifocal">
											
											
											<div role="option-title">
												<span option-name>MULTIFOCAL</span>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Multifocal lenses are designed to help you focus on things Society near and far. EYEBUYDIRECT offers traditional bifocals, progressive lenses as well as premium progressive lenses.</div>
												</a>
											</div>
										
										
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-multfocal"></i> </div>
												<div text-box>
													<p option-intro>Lenses for seeing things both close and far away</p>
												</div>
											</div>
										</div>
										<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_bifocal">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>Bifocal lenses provide a distinct separation between the distance and the reading part of the glasses by utilizing a segmented half-shaded circle in the bottom portion of the lenses for magnification. This segment causes a visible line on the lens. For these type of lenses, the PD (Pupillary Distance) measurement is very important to ensure that the center of vision is placed correctly on the lenses.amatically broader perspectives, a wider range of intermediate and near distances, and more.</div>
											</a>
											<span sub-option-name>BIFOCAL</span>
										</div>
										<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_progressive">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>Progressive lenses correct vision at all distances, completely eliminating the need to switch between reading and distance glasses throughout your day.</div>
											</a>
											<span sub-option-name>PROGRESSIVE</span>
										</div>
										<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_premium">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>Experience a whole new level of transitional vision comfort and accuracy. In addition to enhancing the already convenient features of standard progressives, premium progressive lenses introduce a suite of powerful new benefits. This exceptional lens option offers dr3. </div>
											</a>
											<span sub-option-name>PREMIUM PROGRESSIVE</span>
										</div>
									</div>
									
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="usage_non_prescription">
												
													<div role="option-title">
														<span option-name>NON-PRESCRIPTION</span>
														<a class="social-icon social-icon--github">
														<i class="fa fa-info" aria-hidden="true"></i>
														<div tooltip-design-2>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
													</a>
													</div>
													
												
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-non-prescription"></i> </div>
												<div text-box>
													<p option-intro>Lenses without any prescription</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> 
							<div role="wizard_panel_content" id="upload_prescription_div_box" class="itemCarousel active" style="display:none;">
								<div role="wizard_panel_content_box_hodler">
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox right carousel-control" id="enter_manual_prescription" >
											<div role="option-title">
												<span option-name>ENTER PRESCRIPTION</span>
											</div>
											<div role="wizard_panel_content_box_img_box">
												<div img-box style="background-color:#00CED1; border-radius:50%; margin-left:20px; display:flex; justify-content:center;"> <i class='fas fa-file-export' style="font-size:41px !important;color:#fff; display:flex; justify-content:center; align-items:center;"></i> </div>
												<div text-box>
													<p option-intro>Enter Prescription Details Manually in the next step.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="upload_prescription_image" style="position:relative;">
												<input type="file" id="uploaded_prescription_file" style="position:absolute; width:100%; height:100%; opacity:0; top:0; left:0;" name="uploaded_prescription_file">
											<div role="option-title">
												<span option-name>UPLOAD PRESCRIPTION</span>
											</div>
											<div role="wizard_panel_content_box_img_box">
												<div img-box style="background-color:#00CED1; border-radius:50%; margin-left:20px; display:flex; justify-content:center;"> <i class="fa fa-upload" aria-hidden="true" style="font-size:41px !important;color:#fff; display:flex; justify-content:center; align-items:center;"></i> </div>
												<div text-box>
													<p option-intro>Upload Prescription Image. <br />Click here to upload or Drag and Drop your file.  </p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
								</div>
							</div>

							<div role="wizard_panel_content" id="prescription_div_box" class="itemCarousel">
								<div role="add__rx__container">
									<div class="add__rx__container_flex">
										<label style="padding-bottom: 0px;"><b style="opacity: 0;">OD <br /><span>(Right eye)</span></b></label>
										<label class="rx-name-title"><span>Sphere</span> <em>(SPH)</em></label>
										<label class="rx-name-title"><span>Cylinder</span> <em>(CYL)</em></label>
										<label class="rx-name-title">Axis</label>
										<label class="rx-name-title">ADD</label>
									</div>
									<div class="add__rx__container_flex">
										<label>OD <br /><span>(Right eye)</span></label>
										<label>
											<select id="right_eye_sphere">
												<option>1.00</option>
											</select>
										</label>
										<label>
											<select id="right_eye_cylinder">
												<option>2.00</option>
											</select>
										</label>
										<label>
											<input class="add__rx__container_flex_input" type="number" pattern="\d*" size="3" value="" name="od_axis" disabled="" class="disabled" id="right_eye_axis" min="0" max="180" placeholder="Right Eye Axis">
										</label>
										<label>
											<select id="right_eye_add">
												<option>0.00</option>
											</select>
										</label>
									</div>
									<div class="add__rx__container_flex">
										<label>OS <br /><span>(Left eye)</span></label>
										<label>
											<select id="left_eye_sphere">
												<option>0.00</option>
											</select>
										</label>
										<label>
											<select id="left_eye_cylinder">
												<option>0.00</option>
											</select>
										</label>
										<label>
											<input class="add__rx__container_flex_input" type="number" pattern="\d*" size="3" value="" id="left_eye_axis" name="od_axis" disabled="" class="disabled" min="0" max="180" placeholder="Left Eye Axis">
										</label>
										<label>
											<select id="left_eye_add">
												<option>0.00</option>
											</select>
										</label>
									</div>

									<div class="add__rx__container_flex add__rx__container_flex_last">
										<label>PD <br /><span>(Pupillary Distance)</span></label>
										<label id="single_pd_label">
											<select id="single_pd">
												<option>Single PD</option>
											</select>
										</label>
										<label id="left_pd_label">
											<select id="left_pd">
												<option>Left PD</option>
											</select>
										</label>
										<label id="right_pd_label">
											<select id="right_pd">
												<option>Right PD</option>
											</select>
										</label>
										<label class="input__checkbox">
											<input type="checkbox" id="double_pd_checkbox">
											 Two PD numbers  
										</label>
									</div>
									<div button__holder>
										<button id="confirm_prescription">Confirm</button>
									</div>
								</div>
							</div>

							<div role="wizard_panel_content" id="lens_type_div_box" class="itemCarousel">
								<div role="wizard_panel_content_box_hodler">
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_clear">
											
												<div role="option-title">
													<span option-name>CLEAR</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Clear lenses are great for any occasion, whether it's general, day-to-day use, or for fashion.</div>
												</a>
												</div>
												
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-clear"></i> </div>
												<div text-box>
													<p option-intro>Traditional, transparent lenses perfect for everyday use.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_blue_light_blocking">
											
												<div role="option-title">
													<span option-name>BLUE LIGHT BLOCKING</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2> "Our digital screen protection lens. Special filtering technology
														shields your eyes from harmful blue light." ( very important if using Computer /tablets on daily bases)
												</div>
												</a>
												</div>
												
										
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-digital"></i> </div>
												<div text-box>
													<p option-intro>Protect your eyes from the negative side effects of phone, computer, and tablet screens. </p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_sun">
											
											<div role="option-title">
												<span option-name>SUN</span>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>"Choosing our "Basic" tint option allows you to make any frame into classic sunglasses. Select from light or dark, and solid gray, brown, green, or blue."</div>
												</a>
											</div>
												
									
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-sun"></i> </div>
												<div text-box>
													<p option-intro>Tint or coat your lenses and turn regular frames into sunglasses.</p>
												</div>
											</div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_light_adjusting">
											
												<div role="option-title">
													<span option-name>LIGHT ADJUSTING</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Select from our premium TRANSITIONS® ADAPTIVE LENSES™, or proprietary photochromic lenses.</div>
												</a>
												</div>
												
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-light"></i> </div>
												<div text-box>
													<p option-intro>Lenses that darken when exposed to outside light and remain clear inside.</p>
												</div>
											</div>
										</div>
										<div class="main_parent_photochromic">
											<div class="event_rx__rx_option" id="lens_type_photochronic">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>Indoor and outdoor glasses all in one. This coating darkens and lightens with direct exposure to sunlight, becoming sunglasses outdoors and regular glasses indoors.</div>
											</a>
												<span sub-option-name>Photochromic</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
													<div color>
														<button id="confirm_transitions_photochromic">Confirm</button>
													</div>
												</div>
											</div>
										</div>
										<div class="main_parent_signature">
											<div class="event_rx__rx_option" id="lens_type_signature">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>TRANSITIONS™ SIGNATURE® LENSES
												Enjoy the benefits of sunglasses and eyeglasses in one convenient frame. With Chromea7™ technology, these lenses automatically darken for UV protection while outdoors and clear up while indoors. The perfect choice for on-the-go adults and kids.</div>
											</a>
												<span sub-option-name>Transitions Signature</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
													<div color>
														<button id="confirm_transitions_signature">Confirm</button>
													</div>
												</div>
											</div>
										</div>
										<div class="main_parent_xtractive">
											<div class="event_rx__rx_option" id="lens_type_xtractive">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>TRANSITIONS™ XTRACTIVE® LENSES
												These lenses transition between tinted and clear even faster than Signature® Lenses, while also reducing the harmful effects of digital screens! The perfect way to reduce the effects of both natural and artificial light while indoors, outdoors, or on the road.</div>
											</a>
												<span sub-option-name>Transitions XTRActive</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
														<div color>
															<button id="confirm_transitions_xtractive">Confirm</button>
														</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> 

							<div role="wizard_panel_content" id="lens_options_div_box" class="itemCarousel">
								<div role="wizard_panel_content_box_hodler">
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_basic_lens">
										
											<div role="option-title">
												<span option-name>BASIC LENSES</span>
												<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>1.50 index Lenses Anti-Scratch Coating Anti-Reflective Coating UV protection</div>
											</a>
											
											
										</div>
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-basic-one"></i> </div>
												<div text-box>
													<p option-intro>Quality 1.5 index lenses with anti-scratch and anti-reflective coatings.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_most_popular_lenses">
										
											<div role="option-title">
												<span option-name>MOST POPULAR LENSES</span>
											</div>
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>Quality 1.6 index lenses with UV-protective, anti-scratch, anti-reflective coatings.</div>
											</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-most"></i> </div>
												<div text-box>
													<p option-intro>Quality 1.6 index lenses with UV-protective, anti-scratch, anti-reflective coatings.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_advanced_lens">
											
												<div role="option-title">
													<span option-name>ADVANCED LENSES</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Recommended for prescriptions with SPH (+/-3.and +/- 3.00 ) and CYL (+/- 2.25 and +/-3.00)
													Includes: Scratch protection and anti-glare
													</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-most"></i> </div>
												<div text-box>
													<p option-intro>Quality 1.6 index lenses with UV-protective, anti-scratch, anti-reflective coatings.</p>
												</div>
											</div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_customize">
											
												<div role="option-title">
													<span option-name>CUSTOMIZE</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
												
												
											</div>
											<div role="wizard_panel_content_box_img_box">
												<!-- <div class="img-box"> <i class="im-rx im-rx-distance"></i> </div> -->
												<div text-box>
													<p option-intro>Select your preferred lens index and coatings.</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div> 

							<div role="wizard_panel_content" id="blue_light_blocking_div_box" class="itemCarousel">
								<div role="wizard_panel_content_box_hodler">
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_basic_lens">
											
												<div role="option-title">
													<span option-name>EBDBlue</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>"Our digital screen protection lens. Special filtering technology
													shields your eyes from harmful blue light." ( very important if using Computer /tablets on daily bases)
													</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-ebd-blue"></i> </div>
												<div text-box>
													<p option-intro>Our blue light blocking lens. Special filtering technology shields your eyes from harmful blue light.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue15">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>"Basic (1.56) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>EBDBlue 1.5</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue16">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>"Thin (1.6) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>EBDBlue 1.6</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue167">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>: "Super Thin (1.67) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>EBDBlue 1.67</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue174">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>" (1.74) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>EBDBlue 1.74</span>
										</div>
									</div>
								</div>
							</div>

							<div role="wizard_panel_content" id="sun_lens_colours_div_box" class="itemCarousel">
								<div role="wizard_panel_content_box_hodler">
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="sun_lens_basic_colour">
											
												<div role="option-title">
													<span option-name>BASIC</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-clear"></i> </div>
												<div text-box>
													<p option-intro>Turn any pair into sunwear. Choose from three classic colors to make your own sunglasses</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									
										<div role="wizard_panel_content_box">
											<div class="wizard_panel_contentBbox" id="sun_lens_gradient_colour">
											
												<div role="option-title">
													<span option-name>GRADIENT</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>"Gradient" tint is ideal for those who want to wear shades in varying light settings. The dark top is great for keeping the sun out of your eyes while the light bottom lets you view things without having to take your sunglasses off.
													</div>
												</a>

											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-gradient"></i> </div>
												<div text-box>
													<p option-intro>Combine fashion with function with trendy gradient lenses that go from dark on the top to light on the bottom</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									
									<div class="option__holder grid_span_2" id="tint_strength_basic_lens">
										<div class="option__holder_color_holder">
										<h6>Tint Strengh:</h6>
											<div color class="col" id="col_tint_perc">
												<a href="JavaScript:Void(0);">50 %</a>
												<a href="JavaScript:Void(0);">80 %</a>
											</div>
										<h6>Tint Colour:</h6>
											<div color class="col" id="col">
											</div>
											<div color><button id="confirm_sun_colour_basic">Confirm</button></div>
										</div>
									</div>

									<div class="option__holder grid_span_2" id="tint_strength_gradient_lens">
										<div class="option__holder_color_holder">
										<h6>Tint Strengh: 80% to 10%  &nbsp; &nbsp;&nbsp; &nbsp; Colour:</h6>
											<div color class="col" id="col">
											</div>
											<div color><button id="confirm_sun_colour_gradient">Confirm</button></div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="sun_lens_mirrored_colour">
											
												<div role="option-title">
													<span option-name>MIRRORED</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Go incognito with "Mirrored" lenses. Standard with anti-glare and anti-scratch, they combine the protection you need with the style you want.</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-mirrored"></i> </div>
												<div text-box>
													<p option-intro>Add flash to your style with mirrored lenses</p>
												</div>
											</div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="sun_lens_polarized_colour">
											
												<div role="option-title">
													<span option-name>POLARIZED</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>The best UV protection under the sun. Polarized lenses enhance vision quality and comfort by blocking bright glares and reflections. Perfect for any sunny activity, whether it's on the road or even in the water.</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-polarized"></i> </div>
												<div text-box attribute="texting">
													<p option-intro>Polarized lenses reduce extra bright light glares and hazy vision. An option that offers superior clarity and eye protection</p>
												</div>
											</div>
										</div>
										<div class="main_parent_polarized_basic">
											<div class="event_rx__rx_option" id="polarized_basic_tint_colour">
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-4>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
												<span sub-option-name>Basic Tint</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
													<div color>
														<button id="confirm_polarized_basic">Confirm</button>
													</div>
												</div>
											</div>
										</div>
										<div class="main_parent_polarized_mirrored">
											<div class="event_rx__rx_option" id="polarized_mirrored_tint_colour">
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-4>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
												<span sub-option-name>Mirrored Tint</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
													<div color>
														<button id="confirm_polarized_mirrored">Confirm</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									 <div class="option__holder grid_span_2" id="tint_strength_mirrored_lens">
										<div class="option__holder_color_holder">
										<h6>Mirrored Colour:</h6>
											<div color class="col" id="col">
											</div>
											<div color> <button id="confirm_sun_colour_mirrored">Confirm</button></div>
										</div>
									</div>
								</div>
							</div> 

							<div role="wizard_panel_content" class="itemCarousel" id="customize_lens_div_box">
								
								<div last__box__holder>
									<div last-box>
										<div last__box__holder_box id="customize_lens_15_index_lens">
										<span>1.5 INDEX LENS</span> <input type="radio" />
										</div>
										<a class="social-icon social-icon--github">
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-2>Recommended for prescriptions with SPH (+/- 2.25 and below) and CYL (+/- 1.50 and below)
											Includes: Scratch protection</div>
										</a>
									</div>
									<div last-box>	
										<div last__box__holder_box id="customize_lens_157_index_lens">
										
										<span>1.56 INDEX LENS</span> <input type="radio" /></div>
										<a class="social-icon social-icon--github">	
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-2>Recommended for prescriptions with SPH (+/- 5.00 and +/- 4.00) and CYL (+/- 300 and below)
											Includes: Scratch protection and anti-glare</div>
										</a>
									</div>
<!--
										
									<div last__box__holder_box id="customize_lens_159_index_lens">
										<a class="social-icon social-icon--github">	
										<i class="fa fa-info" aria-hidden="true"></i>
											<div class="tooltip-2">Recommended for prescriptions with SPH (+/- 4.00 and +/- 6.00 and CYL (+/- 200 and below)
											Includes: Scratch protection, anti-glare, and UV protection</div>
										</a>
										<span>1.59 INDEX LENS</span> <input type="radio" /></div>
-->
								<div last-box>		
										
									<div last__box__holder_box id="customize_lens_16_index_lens">
										<span>1.6 INDEX LENS</span> <input type="radio" /></div>
										
									<a class="social-icon social-icon--github">	
									<i class="fa fa-info" aria-hidden="true"></i>
										<div tooltip-design-2>Recommended for prescriptions with SPH (+/-3.and +/- 3.00 ) and CYL (+/- 2.25 and +/-3.00)
										Includes: Scratch protection and anti-glare
										</div>
									</a>
									</div>
									<div last-box>
										<div last__box__holder_box id="customize_lens_167_index_lens">
										<span>1.67 INDEX LENS</span> <input type="radio" /></div>
										
										<a class="social-icon social-icon--github">	
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-4>Recommended for prescriptions with SPH  (+/- 2-15 and +/-5) and CYL (+/- 3.25 and +/- 4. 00)
											Includes: Scratch protection and anti-glare at Lincoln

										</div>
										</a>
									</div>
									<div last-box>
										<div last__box__holder_box id="customize_lens_174_index_lens">
											<span>1.74 INDEX LENS</span> <input type="radio" /></div>
											<a class="social-icon social-icon--github">	
											<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-4>Recommended for prescriptions with SPH (+/- 4 and +/- 12) and CYL (+/-4) 
												Includes: Scratch protection and anti-glare

											</div>
											</a>
										</div>	
									</div>				
								</div>
							</div>
						</div>
                

                    <div next_left_arrow>
                        <a left carousel-control href="JavaScript:Void(0);" role="button" data-slide="prev">
                            <span class="" id="go_previous">Previous</span>
                        </a>
                        <a right carousel-control href="JavaScript:Void(0);" role="button" data-slide="next">
                            <span class="" id="go_next">Close</span>
                        </a>
                    </div>
                 </div>
            </div>

        </div>
    </div>
    <div class="lds-roller-holder">
			<div class="lds-roller">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
    <script>
        $('.carousel').carousel({
            interval: false
        });
        $(".wizard_panel_content_box").click(function () {
            $(this).find(".option__holder").slideToggle();
        });
    </script>
    <script>
		jQuery('#button_here').insertAfter('.product_title');
	 </script>
	
	<style>
		#infinite-scroll{
			overflow-y: scroll;
		}
		.wizard_panel_content_box_first{
			order: -1;
		}
		.wizard_panel_content_box_first .option__holder grid_span_2{
			order: -1;
		}
	</style>
	
	<?php
	}
	
}
