<?php Themewrangler::setup_page();get_header('event' /***Template Name: Sadies */); ?>


<article id="minisite">
<?php the_post(); ?>

	<section id="splash" style="background-image: url(http://i.imgur.com/5ejIooe.jpg)">
		<div class="absolute">
		<div class="table">
		<div class="cell">
			<div class="frame">
				<div class="meta bit-1">
					<div class="logo"></div>
					<h1>5 Years of Awesome.</h1>
					<h1>Can you believe it?</h1>
					<h4>The Sadie Hawkins Dance Party of Awesome 2013 Recap</h4>
				</div>
			</div>
		</div>
		</div>
		</div>
	</section>
	
	<section id="about" class="component">
		<div class="frame">
			<div class="content bit-1">
				<p>The <strong>Sadie Hawkins Dance Party of Awesome</strong> is a fundraiser to help progress our 
				mission to create opportunities and programs for disadvantaged youth 
				at <strong>Los Angeles’ parks and recreation centers</strong>.</p>
				
				<p>On <strong>Oct. 5th, 2013</strong>, we transformed the <strong>Fred Harvey Room at Union Station</strong> in Los Angeles into our own private dance party.</p>
			</div>
		</div>
	</section>
	
	<section id="video" class="component">
		<div class="frame">
			<div class="content bit-1">
				<iframe src="//player.vimeo.com/video/80950128?portrait=0" width="1100" height="618" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				<div class="caption">
					<p>Editing by Kevin Clark</p>
				</div>
			</div>
		</div>
		<div class="absolute"></div>
	</section>
	
	<?php $images = get_field('event_gallery');
	if( $images ): ?>
	<section id="photos">
	<div class="absolute">
	<div class="table">
	<div class="cell">
		<div class="frame">
			<div class="content bit-1">
			</div>
		</div>
	</div>
	</div>
	</div>
	<?php foreach( $images as $image ): ?>
	<a href="<?php echo $image['sizes']['large']; ?>" class="lb bit-10">
		<span class="overlay absolute"></span>
		<img src="<?php echo $image['sizes']['square-320']; ?>" alt="<?php echo $image['alt']; ?>" />
	</a>
	<?php endforeach; ?>
	<div class="frame">
		<div class="caption">
			<p>Photos by Brian Faini, Hogan Carter and Jon Jandoc.</p>
		</div>
	</div>
	</section>
	<?php endif;?>
	
	<section id="thanks" class="component">
		<div class="frame">
			<div class="content bit-1">
				<h4>Seriously, thank you</h4>
				<p>A special shout-out to the volunteers who did a ton of the heavy lifting to make <strong>Sadie Hawkins</strong> happen. This event would have been in an alley with some malt liquor, a bag of hot cheetos and a walkman if these folks had not been involved.</p>
				
				<p class="smaller">Amirah, Calvin, Melo, Nate, Patrick, Miguel, Bonnie, Rainbeau, Amber, Sarah, Joe, Jeffrey, Hogan, Faini, Jon, Papa Neil, Kirstin, Nikki, Brendan, Catherine, JC, Dave, Ronaldo, Nicole and Rob.</p>
			</div>
		</div>
	</section>
	
	<section id="sponsors" class="component">
		<div class="frame">
			<div class="content bit-1">
				<h4>And Our Sponsors:</h4>
			</div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/barefoot.png" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/StellaArtois_gif.gif" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/UMAMIBURGERwithLips-large.png" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/whole-foods-market-logo.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/CPRLogo-RGB.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/DSC_LOGO_noTag.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/GuelaguetzaLogo-1024x630.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/kinetic_logo_cymk.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/lakeviewlogo.gif" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/LPK-final-logo.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/madelogo.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/sidecar-logo-gray.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/sig_logo_sm.png" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://theyachtclub.org/x/wp-content/uploads/2013/12/stella_cidre.jpg" alt="" /></div></div></div>
			<div class="item bit-5"><div class="table"><div class="cell"><img src="http://i.imgur.com/d0OjwE8.jpg" alt="" /></div></div></div>
		</div>
	</section>
	
	<section id="thanksagain" class="component" style="background-image: url(http://theyachtclub.org/x/wp-content/uploads/2013/12/MG_9278blue.jpg)">
		<div class="absolute">
		<div class="table">
		<div class="cell">
			<div class="frame">
				<div class="meta bit-1">
					<div class="logo"></div>
					<h1>And, a huge THANK YOU to all that came.</h1>
					<h4>We hope to see you again in 2014.</h4>
				</div>
			</div>
		</div>
		</div>
		</div>
	</section>

</article>
<script>
$(function () {
	
	var divs = $('#splash .frame');
	var wh = $(window).height();
	
	$(window).on('scroll', function() {
	   var st = $(this).scrollTop();
	   divs.css({ 'opacity' : (1 - st/(wh/1.3)) });
	});
	
	$('#photos').magnificPopup({
		delegate: 'a.lb',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function (element) {
				return element.find('img');
			}
		}

	});
});
</script>
<?php get_footer('2'); ?>

