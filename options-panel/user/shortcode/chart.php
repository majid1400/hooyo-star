<?php
function handler_chart_hooyo_star_pro(){
	global $wpdb;
	$id = get_current_user_id();
	$percentage_test = $wpdb->get_results(
		"SELECT `info_user`,`child_name` FROM {$wpdb->prefix}data_form_hooyo_star WHERE user_id = {$id}"
	);
	$info_users = unserialize($percentage_test[0]->info_user)[0]['percentage_test'];
	$child_name = $percentage_test[0]->child_name;

	$labels = [];
	$percentage = [];
	foreach ($info_users as $key => $value){
		$labels[] = convert_hosh_en_to_fa_p($key);
		$percentage[] = $value;
	}
	$percentage[]='';
	$labels_j = json_encode($labels);
	$percentage_j = json_encode($percentage);
	?>
	<canvas id="myChart" width="700" height="500"></canvas></div>
	<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: <?php echo $labels_j; ?>,
                datasets: [{
                    label: <?php echo json_encode($child_name) ?>,
                    backgroundColor: [
                        '#525252',
                        '#ff7070',
                        '#ff3838',
                        '#ff9f1a',
                        'rgba(255, 242, 0)',
                        'rgba(58, 227, 116)',
                        'rgba(23, 192, 235)',
                        'rgba(113, 88, 226)',
                    ],
                    // borderWidth: 2,
                    // borderColor: 'rgb(255, 99, 132)',
                    data: <?php echo $percentage_j; ?>
                }]
            },

            // Configuration options go here
            options: {
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontFamily: 'iransans,Tahoma'
                    }
                }

            }
        });
	</script>
<?php
}
function convert_hosh_en_to_fa_p($text)
{
	switch ($text) {
		case "kalami":
			return "کلامی-زبانی";
			break;
		case "logical":
			return "منطقی-ریاضی";
			break;
		case "pic":
			return "تصویری-فضایی";
			break;
		case "motion":
			return "حرکتی-جنبشی";
			break;
		case "music":
			return "موسیقیایی";
			break;
		case "miyanFardi":
			return "میان-فردی";
			break;
		case "daronFardi":
			return "درون-فردی";
			break;
		case "naturalist":
			return "طبیعت-گرا";
			break;
	}
}
add_shortcode('chart_hooyo_star_pro','handler_chart_hooyo_star_pro');

