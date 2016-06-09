$(document).ready(function() {
	$('.tile_count .tile_stats_count:eq(0)').click(function(event) {
		/* Act on the event */
		$('.title-chart').html('Biểu đồ tổng User ');
		$('.chartcanvas').attr('id', 'Users');
		$('.chartuser').html('<script>var ctx = document.getElementById("Users").getContext("2d"); window.myLine = new Chart(ctx, configUser);</script>');

	});

	$('.tile_count .tile_stats_count:eq(1)').click(function(event) {
		/* Act on the event */
		$('.title-chart').html('Biểu đồ Photos ');
		$('.chartcanvas').attr('id', 'Photos');
		$('.chartuser').html('<script>var ctx = document.getElementById("Photos").getContext("2d"); window.myLine = new Chart(ctx, configPhotos);</script>');

	});

	$('.tile_count .tile_stats_count:eq(2)').click(function(event) {
		/* Act on the event */
		$('.title-chart').html('Biểu đồ Albums ')
		$('.chartcanvas').attr('id', 'Albums');
		$('.chartuser').html('<script>var ctx = document.getElementById("Albums").getContext("2d"); window.myLine = new Chart(ctx, configAlbums);</script>');

	});
	$('.tile_count .tile_stats_count:eq(3)').click(function(event) {
		/* Act on the event */
		$('.title-chart').html('Biểu đồ Newmem ');
		$('.chartcanvas').attr('id', 'Newmember');
		$('.chartuser').html('<script>var ctx = document.getElementById("Newmember").getContext("2d"); window.myLine = new Chart(ctx, configNewmember);</script>');

	});
});

