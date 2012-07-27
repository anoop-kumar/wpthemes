	
	<?php $options = get_option('education_theme_options')  ?>
	<!-- Slider -->
	
	<?php if(!(empty($options['imgurl1'])) || !(empty($options['imgurl2'])) || !(empty($options['imgurl3'])) || !(empty($options['imgurl4'])) || !(empty($options['imgurl5']))) : ?>
	<div class="container sliderarea">
		<div class="row">
			<div class="column-full">
				<div class="flexcontainer"><div class="flexslider">
				<ul class="slides">
				
					<!-- Slide 1 -->
					<?php if(!(empty($options['imgurl1']))) : ?>
					<li>
						<?php if(!(empty($options['imglink1']))) : ?>
						<a href="<?php echo $options['imglink1']; ?>">
						<?php endif; ?>
							<img src="<?php echo $options['imgurl1']; ?>" />
						<?php if(!(empty($options['imglink1']))) : ?>
						</a>
						<?php endif; ?>
						<?php if(!(empty($options['imgtxt1']))) : ?>
						<p class="flex-caption"><?php echo $options['imgtxt1']; ?></p>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					
					<!-- Slide 2 -->
					<?php if(!(empty($options['imgurl2']))) : ?>
					<li>
						<?php if(!(empty($options['imglink2']))) : ?>
						<a href="<?php echo $options['imglink2']; ?>">
						<?php endif; ?>
							<img src="<?php echo $options['imgurl2']; ?>" />
						<?php if(!(empty($options['imglink2']))) : ?>
						</a>
						<?php endif; ?>
						<?php if(!(empty($options['imgtxt2']))) : ?>
						<p class="flex-caption"><?php echo $options['imgtxt2']; ?></p>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					
					<!-- Slide 3 -->
					<?php if(!(empty($options['imgurl3']))) : ?>
					<li>
						<?php if(!(empty($options['imglink3']))) : ?>
						<a href="<?php echo $options['imglink3']; ?>">
						<?php endif; ?>
							<img src="<?php echo $options['imgurl3']; ?>" />
						<?php if(!(empty($options['imglink3']))) : ?>
						</a>
						<?php endif; ?>
						<?php if(!(empty($options['imgtxt3']))) : ?>
						<p class="flex-caption"><?php echo $options['imgtxt3']; ?></p>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					
					<!-- Slide 4 -->
					<?php if(!(empty($options['imgurl4']))) : ?>
					<li>
						<?php if(!(empty($options['imglink4']))) : ?>
						<a href="<?php echo $options['imglink4']; ?>">
						<?php endif; ?>
							<img src="<?php echo $options['imgurl4']; ?>" />
						<?php if(!(empty($options['imglink4']))) : ?>
						</a>
						<?php endif; ?>
						<?php if(!(empty($options['imgtxt4']))) : ?>
						<p class="flex-caption"><?php echo $options['imgtxt4']; ?></p>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					
					<!-- Slide 5 -->
					<?php if(!(empty($options['imgurl5']))) : ?>
					<li>
						<?php if(!(empty($options['imglink5']))) : ?>
						<a href="<?php echo $options['imglink5']; ?>">
						<?php endif; ?>
							<img src="<?php echo $options['imgurl5']; ?>" />
						<?php if(!(empty($options['imglink5']))) : ?>
						</a>
						<?php endif; ?>
						<?php if(!(empty($options['imgtxt5']))) : ?>
						<p class="flex-caption"><?php echo $options['imgtxt5']; ?></p>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					
				</ul>
			  </div></div>
			</div>
		</div>
	</div>
	<?php endif; ?>