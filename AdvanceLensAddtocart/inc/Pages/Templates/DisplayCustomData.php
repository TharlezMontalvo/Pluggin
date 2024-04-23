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
						<li id="design_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Diseño</span>
                        </li>
                        <li id="usage_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Uso</span>
                        </li>
                        <li id="prescription_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Receta</span>
                        </li>
						<li id="material_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Material</span>
                        </li>
						<li id="treatment_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Tratamiento</span>
                        </li>
						<li id="photochromic_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Fotocromático</span>
                        </li>
                        <!--<li id="lens_type_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Tipo de lente</span>
                        </li>
                        <li id="lens_option_li_tracker">
                            <span icon-wrapper><i class="icon"></i></span>
                            <span step-name>Opcion de lente</span>
                        </li>-->
                    </ul>

					<div id="infinite-scroll" class="content">
						<div role="wizard_panel_content__holder" class="carousel-inner">
							<div role="wizard_panel_content" id="design_div_box" class="itemCarousel active">
									<div role="wizard_panel_content_box_hodler">
									
											<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>If your prescription has a negative ( - ) number and 0 ADD, this means that you need "Distance" lenses. Distance lenses are needed when things up close appear clear, while things further away look blurry. This is called nearsightedness, or myopia. Reading (Opens the second stage "Prescription" with the ability to edit fields with the title "ADD")</div>
											</a>
											<div role="wizard_panel_content_box">
												<!--<div class="wizard_panel_contentBbox right carousel-control" id="usage_distance" >-->
												<div class="wizard_panel_contentBbox right carousel-control" id="design_monofocal" >	
														<div role="option-title">
															<span option-name>MONOFOCAL</span>
															<a class="social-icon social-icon--github">
															<i class="fa fa-info" aria-hidden="true"></i>
															<div tooltip-design-2>If your prescription has a negative ( - ) number and 0 ADD, this means that you need "Distance" lenses. Distance lenses are needed when things up close appear clear, while things further away look blurry. This is called nearsightedness, or myopia. Reading (Opens the second stage "Prescription" with the ability to edit fields with the title "ADD")</div>
														</a>
														</div>
															
													
													<div role="wizard_panel_content_box_img_box">
														<div img-box> <i class="im-rx im-rx-distance"></i> </div>
														<div text-box>
															<p option-intro>Corrige cualquier tipo de defecto refractivo: miopía, astigmatismo, hipermetropía o presbicia.</p>
														</div>
													</div>
													<input type="radio" />
												</div>
												
											</div>
									
									
												
												<div role="wizard_panel_content_box">
													<!--<div class="wizard_panel_contentBbox" id="usage_reading">-->
													<div class="wizard_panel_contentBbox" id="design_bifocal">	
															<div role="option-title">
																<span option-name>BIFOCAL</span>
															</div>
															<a class="social-icon social-icon--github">
															<i class="fa fa-info" aria-hidden="true"></i>
																<div tooltip-design-2>"Reader" and "Intermediate" lenses have prescriptions starting with a plus ( + ) sign and are designed for those who have trouble focusing their eyes while reading. These lenses are designed to help correct farsightedness caused by hyperopia or presbyopia.</div>
															</a>
															
														
														<div role="wizard_panel_content_box_img_box">
															<div img-box> <i class="im-rx im-rx-reading"></i> </div>
															<div text-box>
																<p option-intro>Son utilizadas mayormente para personas con presbicia y que también requieren corrección para miopía o hipermetropía.</p>
															</div>
														</div>
														<input type="radio" />
													</div>
													<div class="event_rx__rx_option" id="usage_reading_readers">
														<span sub-option-name>MEDIDA DE CERCA</span>
													</div>
													<div class="event_rx__rx_option"id="usage_reading_intermediate">
														<span sub-option-name>MEDIDA INTERMEDIA (USO DE LA PC)</span>
													</div>
												</div>
										
										
											
										<div role="wizard_panel_content_box">
											<!--<div class="wizard_panel_contentBbox right carousel-control" id="usage_multifocal">-->
											<div class="wizard_panel_contentBbox right carousel-control" id="design_multifocal">	
												
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
														<p option-intro>Para distintas graduaciones de lente que permiten enfocar la visión a distintas distancias del usuario</p>
													</div>
												</div>
											</div>
											<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_bifocal">
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-4>Bifocal lenses provide a distinct separation between the distance and the reading part of the glasses by utilizing a segmented half-shaded circle in the bottom portion of the lenses for magnification. This segment causes a visible line on the lens. For these type of lenses, the PD (Pupillary Distance) measurement is very important to ensure that the center of vision is placed correctly on the lenses.amatically broader perspectives, a wider range of intermediate and near distances, and more.</div>
												</a>
												<span sub-option-name>BIFOCALES CONVENCIONALES </span>
											</div>
											<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_progressive">
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-4>Progressive lenses correct vision at all distances, completely eliminating the need to switch between reading and distance glasses throughout your day.</div>
												</a>
												<span sub-option-name>BIFOCALES INVISIBLES</span>
											</div>
											<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_premium">
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-4>Experience a whole new level of transitional vision comfort and accuracy. In addition to enhancing the already convenient features of standard progressives, premium progressive lenses introduce a suite of powerful new benefits. This exceptional lens option offers dr3. </div>
												</a>
												<span sub-option-name>MULTIFOCALES CONVENCIONALES</span>
											</div>
										</div>
										
										<!--<div role="wizard_panel_content_box">
											<div class="wizard_panel_contentBbox" id="usage_non_prescription">
													
														<div role="option-title">
															<span option-name>SIN RECETA</span>
															<a class="social-icon social-icon--github">
															<i class="fa fa-info" aria-hidden="true"></i>
															<div tooltip-design-2>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
														</a>
														</div>
														
													
												<div role="wizard_panel_content_box_img_box">
													<div img-box> <i class="im-rx im-rx-non-prescription"></i> </div>
													<div text-box>
														<p option-intro>Opción solo válida para lente sin medida…</p>
													</div>
												</div>
											</div>
										</div>-->
									</div>
							</div> 
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
														<p option-intro>Lentes de uso general para ver cosas lejanas </p>
													</div>
												</div>
												<input type="radio" />
											</div>
											
										</div>
								
								
											
											<div role="wizard_panel_content_box">
												<div class="wizard_panel_contentBbox" id="usage_reading">
													
														<div role="option-title">
															<span option-name>MEDIDA DE CERCA</span>
														</div>
														<a class="social-icon social-icon--github">
														<i class="fa fa-info" aria-hidden="true"></i>
															<div tooltip-design-2>"Reader" and "Intermediate" lenses have prescriptions starting with a plus ( + ) sign and are designed for those who have trouble focusing their eyes while reading. These lenses are designed to help correct farsightedness caused by hyperopia or presbyopia.</div>
														</a>
														
													
													<div role="wizard_panel_content_box_img_box">
														<div img-box> <i class="im-rx im-rx-reading"></i> </div>
														<div text-box>
															<p option-intro>Lentes de uso convencional para ver de cerca (33 cm) </p>
														</div>
													</div>
													<input type="radio" />
												</div>
												<div class="event_rx__rx_option" id="usage_reading_readers">
													<span sub-option-name>MEDIDA DE CERCA</span>
												</div>
												<div class="event_rx__rx_option"id="usage_reading_intermediate">
													<span sub-option-name>MEDIDA INTERMEDIA (USO DE LA PC)</span>
												</div>
											</div>
									
									
										
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox right carousel-control" id="usage_multifocal">
											
											
											<div role="option-title">
												<span option-name>BIFOCALES Y/O MULTIFOCALES</span>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Multifocal lenses are designed to help you focus on things Society near and far. EYEBUYDIRECT offers traditional bifocals, progressive lenses as well as premium progressive lenses.</div>
												</a>
											</div>
										
										
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-multfocal"></i> </div>
												<div text-box>
													<p option-intro>Lentes para ver cosas de cerca y de lejos</p>
												</div>
											</div>
										</div>
										<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_bifocal">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>Bifocal lenses provide a distinct separation between the distance and the reading part of the glasses by utilizing a segmented half-shaded circle in the bottom portion of the lenses for magnification. This segment causes a visible line on the lens. For these type of lenses, the PD (Pupillary Distance) measurement is very important to ensure that the center of vision is placed correctly on the lenses.amatically broader perspectives, a wider range of intermediate and near distances, and more.</div>
											</a>
											<span sub-option-name>BIFOCALES CONVENCIONALES </span>
										</div>
										<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_progressive">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>Progressive lenses correct vision at all distances, completely eliminating the need to switch between reading and distance glasses throughout your day.</div>
											</a>
											<span sub-option-name>BIFOCALES INVISIBLES</span>
										</div>
										<div class="event_rx__rx_option right carousel-control" id="usage_multifocal_premium">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>Experience a whole new level of transitional vision comfort and accuracy. In addition to enhancing the already convenient features of standard progressives, premium progressive lenses introduce a suite of powerful new benefits. This exceptional lens option offers dr3. </div>
											</a>
											<span sub-option-name>MULTIFOCALES CONVENCIONALES</span>
										</div>
									</div>
									
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="usage_non_prescription">
												
													<div role="option-title">
														<span option-name>SIN RECETA</span>
														<a class="social-icon social-icon--github">
														<i class="fa fa-info" aria-hidden="true"></i>
														<div tooltip-design-2>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
													</a>
													</div>
													
												
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-non-prescription"></i> </div>
												<div text-box>
													<p option-intro>Opción solo válida para lente sin medida…</p>
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
												<span option-name>INGRESAR RECETA</span>
											</div>
											<div role="wizard_panel_content_box_img_box">
												<div img-box style="background-color:#00CED1; border-radius:50%; margin-left:20px; display:flex; justify-content:center;"> <i class='fas fa-file-export' style="font-size:41px !important;color:#fff; display:flex; justify-content:center; align-items:center;"></i> </div>
												<div text-box>
													<p option-intro>Ingrese los detalles de la receta manualmente dando click aqui.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="upload_prescription_image" style="position:relative;">
												<input type="file" id="uploaded_prescription_file" style="position:absolute; width:100%; height:100%; opacity:0; top:0; left:0;" name="uploaded_prescription_file">
											<div role="option-title">
												<span option-name>SUBIR RECETA</span>
											</div>
											<div role="wizard_panel_content_box_img_box">
												<div img-box style="background-color:#00CED1; border-radius:50%; margin-left:20px; display:flex; justify-content:center;"> <i class="fa fa-upload" aria-hidden="true" style="font-size:41px !important;color:#fff; display:flex; justify-content:center; align-items:center;"></i> </div>
												<div text-box>
													<p option-intro>Carga la imagen de tu receta. <br />Haga click para cargar o arrastrar y soltar tu archivo.  </p>
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
										<label class="rx-name-title"><span>ESFERICO</span> <em>(ESF)</em></label>
										<label class="rx-name-title"><span>CILINDRO</span> <em>(CYL)</em></label>
										<label class="rx-name-title">EJES</label>
										<label class="rx-name-title">ADICIÓN</label>
									</div>
									<div class="add__rx__container_flex">
										<label>OD
 <br /><span>
(Ojo DERECHO)</span></label>
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
											<input class="add__rx__container_flex_input" type="number" pattern="\d*" size="3" value="" name="od_axis" disabled="" class="disabled" id="right_eye_axis" min="0" max="180" placeholder="EJE DEL OJO DERECHO
">
										</label>
										<label>
											<select id="right_eye_add">
												<option>0.00</option>
											</select>
										</label>
									</div>
									<div class="add__rx__container_flex">
										<label>OS <br /><span>(OJO IZQUIERDO)</span></label>
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
											<input class="add__rx__container_flex_input" type="number" pattern="\d*" size="3" value="" id="left_eye_axis" name="od_axis" disabled="" class="disabled" min="0" max="180" placeholder="EJE DEL OJO IZQUIERDO">
										</label>
										<label>
											<select id="left_eye_add">
												<option>0.00</option>
											</select>
										</label>
									</div>

									<div class="add__rx__container_flex add__rx__container_flex_last">
										<label>DP <br /><span>(DISTACIA PUPILAR)</span></label>
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
											DP MONOCULAR

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
											
												<div role="option-title" class ="clearLens">
													<span option-name>BLANCO</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Clear lenses are great for any occasion, whether it's general, day-to-day use, or for fashion.</div>
												</a>
												</div>
												
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-clear"></i> </div>
												<div text-box>
													<p option-intro>Lentes tradicionales y transparentes perfectas para el uso diario.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_blue_light_blocking">
											
												<div role="option-title">
													<span option-name>BLOQUEO DE LA LUZ AZUL (BLUE DEFENSE)</span>
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
													<p option-intro>Proteja sus ojos de los efectos secundarios negativos de las pantallas de teléfonos, computadoras y tabletas. </p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_sun">
											
											<div role="option-title">
												<span option-name>LENTES CON COLOR O SOLARES</span>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>"Choosing our "Basic" tint option allows you to make any frame into classic sunglasses. Select from light or dark, and solid gray, brown, green, or blue."</div>
												</a>
											</div>
												
									
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-sun"></i> </div>
												<div text-box>
													<p option-intro>Colorea tus lentes y conviértelas en lentes solares con tu medida.</p>
												</div>
											</div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_type_light_adjusting">
											
												<div role="option-title">
													<span option-name>LENTES FOTOCROMATICOS</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Select from our premium TRANSITIONS® ADAPTIVE LENSES™, or proprietary photochromic lenses.</div>
												</a>
												</div>
												
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-light"></i> </div>
												<div text-box>
													<p option-intro>Lentes que se oscurecen cuando se exponen a la luz exterior y permanecen claras en elinterior.</p>
												</div>
											</div>
										</div>
										<div class="main_parent_photochromic">
											<div class="event_rx__rx_option" id="lens_type_photochronic">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>Indoor and outdoor glasses all in one. This coating darkens and lightens with direct exposure to sunlight, becoming sunglasses outdoors and regular glasses indoors.</div>
											</a>
												<span sub-option-name>Cristal Photogrey</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
													<div color>
														<button id="confirm_transitions_photochromic">Confirmar</button>
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
												<span sub-option-name>Resina Fotomatic </span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
													<div color>
														<button id="confirm_transitions_signature">Confirmar</button>
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
												<span sub-option-name>Policarbonato Transitions</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Colour:</h6>
													<div color class="col">
														<a href="">Blue</a>
														<a href="">Yellow</a>
													</div>
														<div color>
															<button id="confirm_transitions_xtractive">Confirmar</button>
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
										
											<div role="option-title" class = "basicLens" >
												<span option-name>LENTES UV</span>
												<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>1.50 index Lenses Anti-Scratch Coating Anti-Reflective Coating UV protection</div>
											</a>
											
											
										</div>
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-basic-one"></i> </div>
												<div text-box>
													<p option-intro>Lentes de índice 1.49 con PROTECCIÓN UV.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_most_popular_lenses">
										
											<div role="option-title" class = "most_popular_lenses">
												<span option-name>LENTES ANTIRAYAS O DURAQUARZ</span>
											</div>
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>Quality 1.6 index lenses with UV-protective, anti-scratch, anti-reflective coatings.</div>
											</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-most"></i> </div>
												<div text-box>
													<p option-intro>Lentes de índice 1.49 con PROTECCION CONTRA LAS RAYADURAS(Ideal para niños).</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_advanced_lens">
											
												<div role="option-title" class = "advanced_lens">
													<span option-name>LENTES ANTIREFLEX</span>
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
													<p option-intro>Lentes de índice 1.49 con TRATAMIENTO UV Y ANTIREFLEJANTE.</p>
												</div>
											</div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="lens_options_customize">
											
												<div role="option-title">
													<span option-name>LENTES EN ALTO INDICE</span>
													<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
												
												
											</div>
											<div role="wizard_panel_content_box_img_box">
												<!-- <div class="img-box"> <i class="im-rx im-rx-distance"></i> </div> -->
												<div text-box>
													<p option-intro>Selecciona el índice de tus lentes y recubrimientos preferidos.</p>
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
													<span option-name>BLUE DEFENSE</span>
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
													<p option-intro>Nuestro lente bloqueador de luz azul con halo verde con tecnología de filtrado especial protege sus ojos de la luz azul dañina.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue15">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>"Basic (1.56) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>BLUE DEFENSE/ANTIREFLEX 1.5</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue16">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-2>"Thin (1.6) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>BLUE DEFENSE/FOTOMATIC AR GRIS 1.56</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue167">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>: "Super Thin (1.67) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>BLUE DEFENSE/ALTO INDICE 1.67</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue174">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>: "Super Thin (1.67) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>BLUE DEFENSE/ALTO INDICE 1.74</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue200">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>: "Super Thin (1.67) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>POLICARBONATO/BLUE DEFENSE 1.59- $ 280</span>
										</div>
										<div class="event_rx__rx_option" id="blue_light_blocking_ebdblue300">
											<a class="social-icon social-icon--github">
											<i class="fa fa-info" aria-hidden="true"></i>
												<div tooltip-design-4>" (1.74) Lenses; Anti-Scratch Coating; Anti-Reflective Coating; Blue Light Filter Coating; Complete UV Protection; Water repellent; Due to their blue light filtering properties, EBDBlue lenses may appear to have a faint tint and a slight blue/green reflection."</div>
											</a>
											<span sub-option-name>POLICARBONATO/BLUE DEFENSE/FOTOMATIC AR GRIS 1.59- $ 380</span>
										</div>
									</div>
								</div>
							</div>

							<div role="wizard_panel_content" id="sun_lens_colours_div_box" class="itemCarousel">
								<div role="wizard_panel_content_box_hodler">
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="sun_lens_basic_colour">
											
												<div role="option-title" class = "sbc">
													<span option-name>LENTES COLOREADOS CON PROTECCION UV</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Looking to get glasse0s as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-clear"></i> </div>
												<div text-box>
													<p option-intro>Convierte tus lunas con medida en gafas de sol. elige entre 4 colores clásicos para hacer tus propias gafas de sol</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									
										<div role="wizard_panel_content_box">
											<div class="wizard_panel_contentBbox" id="sun_lens_gradient_colour">
											
												<div role="option-title" class = "sgc">
													<span option-name>Color degradado</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>"Gradient" tint is ideal for those who want to wear shades in varying light settings. The dark top is great for keeping the sun out of your eyes while the light bottom lets you view things without having to take your sunglasses off.
													</div>
												</a>

											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-gradient"></i> </div>
												<div text-box>
													<p option-intro>Combine la moda con la funcionalidad con los modernos lentes degradados que van de oscuro en la parte superior a claro en la parte inferior.</p>
												</div>
											</div>
											<input type="radio" />
										</div>
									</div>
									
									<div class="option__holder grid_span_2" id="tint_strength_basic_lens">
										<div class="option__holder_color_holder">
										<h6>Intensidad del color:</h6>
											<div color class="col" id="col_tint_perc">
												<a href="JavaScript:Void(0);">50%</a>
												<a href="JavaScript:Void(0);">80%</a>
												<a href="JavaScript:Void(0);">100%</a>
											</div>
										<h6>Tint Colour:</h6>
											<div color class="col" id="col">
											</div>
											<div color><button id="confirm_sun_colour_basic">Confirmar</button></div>
										</div>
									</div>

									<div class="option__holder grid_span_2" id="tint_strength_gradient_lens">
										<div class="option__holder_color_holder">
										<h6>Intensidad del color entre 100% al 25%  &nbsp; &nbsp;&nbsp; &nbsp; COLOR:</h6>
											<div color class="col" id="col">
											</div>
											<div color><button id="confirm_sun_colour_gradient">Confirmar</button></div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="sun_lens_mirrored_colour">
											
												<div role="option-title" class = "smc">
													<span option-name>LENTES ESPEJADOS</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>Go incognito with "Mirrored" lenses. Standard with anti-glare and anti-scratch, they combine the protection you need with the style you want.</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-mirrored"></i> </div>
												<div text-box>
													<p option-intro>Agregue estilo a sus lentes de medida</p>
												</div>
											</div>
										</div>
									</div>
									<div role="wizard_panel_content_box">
										<div class="wizard_panel_contentBbox" id="sun_lens_polarized_colour">
											
												<div role="option-title">
													<span option-name>LENTES POLARIZADOS</span>
												</div>
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-2>The best UV protection under the sun. Polarized lenses enhance vision quality and comfort by blocking bright glares and reflections. Perfect for any sunny activity, whether it's on the road or even in the water.</div>
												</a>
											
											<div role="wizard_panel_content_box_img_box">
												<div img-box> <i class="im-rx im-rx-polarized"></i> </div>
												<div text-box attribute="texting">
													<p option-intro>Los lentes polarizados reducen los reflejos de luz extra brillante y la visión borrosa. una opción que ofrece una claridad superior y protección para los ojos.</p>
												</div>
											</div>
										</div>
										<div class="main_parent_polarized_basic">
											<div class="event_rx__rx_option" id="polarized_basic_tint_colour">
												<a class="social-icon social-icon--github">
												<i class="fa fa-info" aria-hidden="true"></i>
													<div tooltip-design-4>Looking to get glasses as accessories but don't require a prescription? Select non-prescription, plano lenses.</div>
												</a>
												<span sub-option-name>POLARIZADO</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Color:</h6>
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
												<span sub-option-name>POLARIZADO ESPEJADO</span>
											</div>
											 <div class="event_rx__rx_option right carousel-control">
												<div class="option__holder_color_holder box_small">
													<h6>Color:</h6>
													<div color class="col">
														<a href="">Azul</a>
														<a href="">Amarillo</a>
														<a href="">Naranja</a>
													</div>
													<div color>
														<button id="confirm_polarized_mirrored">Confirmar</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									 <div class="option__holder grid_span_2" id="tint_strength_mirrored_lens">
										<div class="option__holder_color_holder">
										<h6>Color espejado::</h6>
											<div color class="col" id="col">
											</div>
											<div color> <button id="confirm_sun_colour_mirrored">Confirmar</button></div>
										</div>
									</div>
								</div>
							</div> 

							<div role="wizard_panel_content" class="itemCarousel" id="customize_lens_div_box">
								
								<div last__box__holder>
									<div last-box>
										<div last__box__holder_box id="customize_lens_15_index_lens">
										<span>RESINA 1.62 CON ANTIREFLEX</span> <input type="radio" />
										</div>
										<a class="social-icon social-icon--github">
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-2>Recommended for prescriptions with SPH (+/- 2.25 and below) and CYL (+/- 1.50 and below)
											Includes: Scratch protection</div>
										</a>
									</div>
									<div last-box>	
										<div last__box__holder_box id="customize_lens_157_index_lens">
										
										<span>RESINA 1.62 SIN ANTIREFLEX</span> <input type="radio" /></div>
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
										
									<div last__box__holder_box id="customize_lens_100_index_lens">
										<span>RESINA 1.67 SIN ANTIREFLEX - $ 380</span> <input type="radio" /></div>
										
									<a class="social-icon social-icon--github">	
									<i class="fa fa-info" aria-hidden="true"></i>
										<div tooltip-design-2>Recommended for prescriptions with SPH (+/-3.and +/- 3.00 ) and CYL (+/- 2.25 and +/-3.00)
										Includes: Scratch protection and anti-glare
										</div>
									</a>
									</div>
									<div last-box>
										<div last__box__holder_box id="customize_lens_16_index_lens">
										<span>RESINA 1.67 CON ANTIREFLEX</span> <input type="radio" /></div>
										
										<a class="social-icon social-icon--github">	
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-4>Recommended for prescriptions with SPH  (+/- 2-15 and +/-5) and CYL (+/- 3.25 and +/- 4. 00)
											Includes: Scratch protection and anti-glare at Lincoln

										</div>
										</a>
									</div>
									<div last-box>
										<div last__box__holder_box id="customize_lens_167_index_lens">
										<span>Resina 1.74 SIN ANTIREFLEX</span> <input type="radio" /></div>
										
										<a class="social-icon social-icon--github">	
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-4>Recommended for prescriptions with SPH  (+/- 2-15 and +/-5) and CYL (+/- 3.25 and +/- 4. 00)
											Includes: Scratch protection and anti-glare at Lincoln

										</div>
										</a>
									</div>
									<div last-box>
										<div last__box__holder_box id="customize_lens_174_index_lens">
										<span>Resina 1.74 CON ANTIREFLEX</span> <input type="radio" /></div>
										
										<a class="social-icon social-icon--github">	
										<i class="fa fa-info" aria-hidden="true"></i>
											<div tooltip-design-4>Recommended for prescriptions with SPH  (+/- 2-15 and +/-5) and CYL (+/- 3.25 and +/- 4. 00)
											Includes: Scratch protection and anti-glare at Lincoln

										</div>
										</a>
									</div>
									<div last-box>
										<div last__box__holder_box id="customize_lens_157_index_lens">
											<span>POLICARBONATO 1.59 CON ANTIREFLEX- $ 280</span> <input type="radio" /></div>
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
   <script  src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
		.mini-cart .sc-item-prescription {
        display: none !important;
}
.sc-item-prescription {
    width: 300px;
}
	</style>
	
	<?php
	}
	
}
