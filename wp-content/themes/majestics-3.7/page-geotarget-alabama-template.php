<?php
/*
Template Name: Geotarget Alabama
*/
	get_header();
?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_style.css" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_js/fancybox/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
	<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_js/fancybox/jquery.fancybox.pack.js"></script> -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_js/fancybox/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_js/fancybox/helpers/jquery.fancybox-media.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/includes/alabama/alabama_js/fancybox/helpers/jquery.fancybox-buttons.js"></script>

	<script>
		$(document).ready(function() {
			$('.fancybox').fancybox({

			});
			$('.fancybox-media').fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				arrows: false,
				helpers: {
					media: {},
					buttons: {}
				},

			});
		});
	</script>

	<div class="page-title-wrapper">
		<div class="page-inner-title-wrapper">
			<h1 class="custom-font page-heading container">
				<?php the_title(); ?>
			</h1>
		</div>
	</div>


	<div class="alabamaContainer clearfix">
		<div class="alabamaLeft">
			<img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_top_image.jpg" class="alabamaTopImage">
			<div id="benefitsAndFunContainer" class="alabamaLeftSection">
				<div class="clearfix bafSection">
					<div class="capLeft"><img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_benefits.jpg"></div>
					<div class="capRight">
						<h2>Benefits of Owning a ThermoSpas<sup>&reg;</sup> Hot Tub</h2>
						<p>A hot tub enhances your life by improving your health, relationships, and fitness. At ThermoSpas<sup>&reg;</sup>, you can create a custom hot tub that is specifically built to meet your unique needs.</p>
						<ul>
							<li><span>Feel your stress melt away as you soak in bubbling waters with an adjustable bubbling system</span></li>
							<li><span>Get a fun, low-impact and full-body workout in our swim and exercise spas</span></li>
						</ul>
						<ul>
							<li><span>Soothe your muscles and joints with up to 172 massaging jets</span></li>
							<li><span>Connect with friends and family with spas seating up to 8 people</span></li>
						</ul>
					</div>
				</div>
				<div class="clearfix bafSection">
					<div class="capLeft"><img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_fun_features_lifestyle.jpg"></div>
					<div class="capRight">
						<h2>Lifestyle &amp; Entertainment</h2>
						<p>Transform your Alabama home into an entertainment hub with a hot tub. Friends and family will love catching up and spending time with you in your hot tub year round. The fun is limitless.</p>
						<ul>
							<li><span>Create your own adventure water park for fun family time</span></li>
							<li><span>Skip the swimming holes and take a moonlit soak in your hot tub to rekindle the romance</span></li>
						</ul>
						<ul>
							<li><span>Gather up fellow Bama fans and throw hot tub parties in bubbling waters</span></li>
							<li><span>Transform your backyard into your own private version of Railroad Park and take a relaxing bath to calm your mind and body</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="topSellingContainerContainer" class="alabamaLeftSection">
				<h2>Top Selling Hot Tubs in Alabama</h2>
				<div id="topSellingContainer" class="clearfix">
					<div class="topSeller clearfix">
						<img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_top_selling_concord.png">
						<div class="info">
							<h3>Concord</h3>
							<h4>Seats 4-5 Adults | 51-99 Jets</h4>
							<p>
								A perfect 4-person hot tub, featuring a love seat and luxurious therapy seats with pillows.
							</p>
							<a class="more" target="_blank" href="http://www.thermospas.com/hot-tubs/4-person-hot-tubs.html">Learn more...</a>
						</div>
					</div>
					<div class="topSeller clearfix">
						<img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_top_selling_gemini.png">
						<div class="info">
							<h3>Gemini</h3>
							<h4>Seats 2 Adults | 28-51 Jets</h4>
							<p>
								A stunningly elegant and intimate hot tub perfect for relaxation and romance indoors or outdoors.
							</p>
							<a class="more" target="_blank" href="http://www.thermospas.com/hot-tubs/2-person-hot-tubs.html">Learn more...</a>
						</div>
					</div>
				</div>
			</div>
			<div id="salesRepContainer" class="alabamaLeftSection">
				<h2>Alabama Sales Representative</h2>
				<div class="topInfoContainer clearfix">
					<img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_sales_rep_scott_mccook_sr.jpg">
					<div class="topInfo">
						<h3>Meet Scott McCook, Sr.</h3>
						<div class="phone">1-800-876-0158</div>
						<h4>Service Areas:</h4>
						<ul class="serviceAreas clearfix">
							<li>CALHOUN</li>
							<li>ETOWAH</li>
							<li>JEFFERSON</li>
							<li>LAUDERDALE</li>
							<li>LEE</li>
							<li>LIMESTONE</li>
							<li>MADISON</li>
							<li>MARSHALL</li>
							<li>MONTGOMERY</li>
							<li>MORGAN</li>
							<li>SHELBY</li>
							<li>TUSCALOOSA</li>
						</ul>
						<a href="#allServiceAreas" class="moreServiceArea fancybox">View full service area...</a>
						<div id="allServiceAreas" style="width: 1280px;">
							<img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_coverage_map_large.jpg">
							<br>
							<ul>
								<li>AUTAUGA</li>
								<li>BIBB</li>
								<li>BLOUNT</li>
								<li>BULLOCK</li>
								<li>CALHOUN</li>
								<li>CHAMBERS</li>
								<li>CHEROKEE</li>
								<li>CHILTON</li>
								<li>CLAY</li>
								<li>CLEBURNE</li>
							</ul>
							<ul>
								<li>COLBERT</li>
								<li>COOSA</li>
								<li>CULLMAN</li>
								<li>DALLAS</li>
								<li>DE KALB</li>
								<li>ELMORE</li>
								<li>ETOWAH</li>
								<li>FAYETTE</li>
								<li>FRANKLIN</li>
								<li>GREENE</li>
							</ul>
							<ul>
								<li>HALE</li>
								<li>JACKSON</li>
								<li>JEFFERSON</li>
								<li>KEMPER</li>
								<li>LAMAR</li>
								<li>LAUDERDALE</li>
								<li>LAWRENCE</li>
								<li>LEE</li>
								<li>LIMESTONE</li>
								<li>LOWNDES</li>
							</ul>
							<ul>
								<li>MACON</li>
								<li>MADISON</li>
								<li>MARENGO</li>
								<li>MARION</li>
								<li>MARSHALL</li>
								<li>MONTGOMERY</li>
								<li>MORGAN</li>
								<li>NOXUBEE</li>
								<li>PERRY</li>
								<li>PICKENS</li>
							</ul>
							<ul>
								<li>RANDOLPH</li>
								<li>SAINT CLAIR</li>
								<li>SHELBY</li>
								<li>SUMTER</li>
								<li>TALLADEGA</li>
								<li>TALLAPOOSA</li>
								<li>TUSCALOOSA</li>
								<li>WALKER</li>
								<li>WILCOX</li>
								<li>WINSTON</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="bottomInfoContainer">
					<p>
						Scott McCook has earned the title of &ldquo;ThermoSpas Top Alabama Salesman&rdquo; each of his five years employed. This comes as no surprise to anyone who knows the 25-year veteran of in-home sales. At an early age, McCook learned that without perseverance, dedication, and a respect for others, you won&rsquo;t achieve a lot in life.
					</p>

					<div id="moreBioParagraphs">
						<p>
							McCook is living proof that perseverance leads to success. After working in the construction industry for several years, McCook tried enlisting in the military, but was rejected because he is partially blind. This didn&rsquo;t discourage him though. For McCook, rejection is just a door to another opportunity. And this particular door led McCook into a completely new field: sales.
						</p>

						<p>
							After several years honing his sales craft, McCook was interested in doing more innovative work. This desire led him to a sales opportunity with ThermoSpas. McCook was a perfect match for the forward-thinking hot tub manufacturer, which collaborated with the Arthritis Foundation to develop the Healing Spa. The Healing Spa is the only hot tub to receive the prestigious &ldquo;Ease of Use Commendation&rdquo; from the Arthritis Foundation.
						</p>

						<p>
							Though many of his evenings and weekends are happily spent espousing the virtues of ThermoSpas, McCook is also proud to call himself a family man. He is the proud father of 5 children, ranging in age from 14 to 24, and a blessed &ldquo;Papa&rdquo; of two.
						</p>

						<p>
							<a target="_blank" href="http://www.thermospas.com/site-inspection.html">Schedule a free, no obligation site inspection today</a> with ThermoSpas<sup>&reg;</sup> hot tub in Alabama. One of our expert sales representatives &ndash; perhaps even Scott McCook -- will come to your home to help you choose the best hot tub for you and the perfect place to put it.
						</p>
					</div>

					<a href="javascript:;" id="moreBio">Read Scott's full bio...</a>
					<script type="text/javascript">
						$(document).ready(function(){
							$('#moreBio').click(function(){
								$('#moreBioParagraphs').slideDown();
								$('#moreBio').hide();
							});
						});
					</script>
				</div>
			</div>
		</div>
		<div class="alabamaRight">
			<div id="alabamaSidebarForm">
				<?php echo do_shortcode('[gravityform id="1" name="Alabama DVD" title="true" description="true"]') ?>
				<div class="privacy"><p><a href="/privacy-policy">Privacy Policy</a></p></div>
			</div>

			<div class="quoteBlock">
				<p>&ldquo;We are extremely happy with our new ThermoSpas Park Avenue&hellip;&rdquo;</p>
				<div class="name">Henry &amp; Kathleen J.</div>
				<div class="location">Ashville, AL</div>
				<a class="more fancybox" href="#quote1Full">Read More</a>
			</div>
			<div class="quoteFull" id="quote1Full" style="width: 1280px;">
				<p>
					&ldquo;We have the Park Avenue model ThermoSpas.  We were looking for a spa with a double-wide lounge seat and loved the layout of the Park Avenue.  My husband and I are both active and the therapeutic massaging jets are soothing to our sore muscles.  We have been in our hot tub every night since we purchased it in August except for maybe 5 nights.  My favorite spot is the wave lounge. I really like having the option of low or high output.  There are times we need full force for the therapeutic benefits, and then there are times we just want a low flow relaxing experience.
				</p>
				<p>
					Our son, who is 26 years old, comes down often at night to sit in the spa after he gets off work.  It has become a family time to talk and relax together.  My son and I love the colorful lights and the bubble action.  We are all sleeping so much better after relaxing in the spa each night; a deeper, longer sleep.  As my husband &amp; I are getting older...I&#x27;m 57, he&#x27;s 61; we have noticed a marked improvement in our physical wellbeing since getting the ThermoSpas hot tub. We have improved mobility, less aches and pains, and are much more relaxed after using the spa.
				</p>
				<p>
					Our salesman, Scott did an excellent job presenting his product.  We had looked at several other hot tubs that were cheaper, but we saw the quality of the ThermoSpas products through Scott&#x27;s detailed presentation. He knew his product and presented it well. We are extremely happy with our new ThermoSpas Park Avenue and would recommend this company to anyone who is looking for quality, service and satisfaction.&rdquo;
				</p>

				<div class="name">Henry &amp; Kathleen J.</div>
				<div class="location">Ashville, AL</div>
			</div>

			<!-- <a class="fancybox-media fancybox.iframe" href="https://www.google.com/maps/place/Alabama/@32.6010112,-86.6807364,7z/data=!3m1!4b1!4m2!3m1!1s0x88867f341f4bfe75:0x5e55343553c8cce9"> -->
			<a class="fancybox" href="#allServiceAreas">
				<img src="<?php echo get_template_directory_uri() ?>/includes/alabama/images/alabama_state_map.jpg">
			</a>

			<div class="blogContainer">
				<h2>Top Warm Weather Blog Posts</h2>

				<ul>
					<li><a target="_blank" href="http://www.thermospas.com/blog/protect-sun-hot-tub-pool-summer/">
						<div class="title">How to Protect Yourself From the Sun in a Hot Tub or Pool</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/how-to-plan-an-evening-with-the-kids-thats-out-of-this-world/">
						<div class="title">Family Hot Tub Night: Stargazing Guide</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/watch-football-the-right-way-in-your-hot-tub/">
						<div class="title">How to Watch Football the Right Way in Your Hot Tub</div>
						<div class="more">Read more...</div>
					</a></li>

<!--					<li><a target="_blank" href="http://www.thermospas.com/blog/5-ways-to-conserve-water-with-your-hot-tub/">
						<div class="title">5 Ways To Conserve Water With Your Hot Tub</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/drink-recipes-refreshing-drinks-sip-hot-tub/">
						<div class="title">Refreshing Drinks To Sip On in Your Hot Tub on a Sunny Day</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/4-great-leg-exercises-to-do-in-your-hot-tub/">
						<div class="title">4 Great Leg Exercise To Do In Your Hot Tub On A Sunny Day</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/hot-tub-cover-care-biggest-threats-spa-cover/">
						<div class="title">Hot Tub Cover Care: The Biggest Threats To Your Hot Tub Cover</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/safely-storing-hot-tub-chemicals/">
						<div class="title">Safely Storing Your Hot Tub Chemicals Away From The Sun</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/get-the-ultimate-workout-with-thermospas-swim-spas-and-exercise-spas/">
						<div class="title">Get The Ultimate Workout With ThermoSpas Swim Spas And Exercise Spas</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/what-you-should-know-about-hot-tubs-dehydration/">
						<div class="title">What You Should Know About Hot Tubs &amp; Dehydration</div>
						<div class="more">Read more...</div>
					</a></li>

					<li><a target="_blank" href="http://www.thermospas.com/blog/make-hot-tub-cinema/">
						<div class="title">How to Make Your Own Hot Tub Cinema</div>
						<div class="more">Read more...</div>
					</a></li>
-->

				</ul>

				<a target="_blank" href="http://www.thermospas.com/blog/" class="exploreBlog">Explore the blog...</a>
			</div>
		</div>
	</div>


<?php
	get_footer();
?>