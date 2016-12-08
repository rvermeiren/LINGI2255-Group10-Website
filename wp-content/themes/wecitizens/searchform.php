<form method="get" id="form" action="<?php bloginfo('url'); ?>/">
	<input class="search-text" type="text" value="<?php the_search_query(); ?>" name="s" id="s">
	<input class="search-submit" type="submit" id="submit" value="OK">
</form>