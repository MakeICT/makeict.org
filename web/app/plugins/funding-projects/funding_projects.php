<?php
/**
* Plugin Name: Funding projects
* Version: 0.1
* Author: Dominic Canare <dom@makeict.org>
* License: GPL2
*/

setlocale(LC_MONETARY, 'en_US.utf8');
function funding_project_info($atts){
	$atts = shortcode_atts(array(
		'children_of' => null,
		'project' => null,
		'show_headings' => 'true',
		'heading_level' => 3
	), $atts);
	$projects = get_option('funding_projects_list');
	if(empty($projects)) return 'Funding projects could not be loaded :(';
	$output = '';
	
	$noParams = empty($atts['project']) && $atts['children_of'] === null;
	foreach($projects as $project){
		if(($noParams) || ($project['Name'] == $atts['project']) || ($atts['children_of'] !== null && $project['Parent project'] == $atts['children_of'])){
			if(count($project['items']) > 0){
				if($atts['show_headings'] == 'true'){
					$output .= '
						<h'. ($atts['heading_level']) . '>' .
						$project['Name'] . ': ' .
						money_format('%.2n', $project['totalRaised']) . ' of ' . money_format('%.2n', $project['totalCost']) . '
						</h'. ($atts['heading_level']) .'>
						<h'. ($atts['heading_level']+1) .'>' . $project['Description'] . '</h'. ($atts['heading_level']+1) .'>';
				}
				$output .= '
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>Item</th>
								<th class="hidden-xs">Price</th>
								<th class="hidden-xs">Qty</th>
								<th>Cost</th>
								<th>Raised</th>
								<th class="hidden-xs">Note</th>
							</tr>
						</thead>
						<tbody>';
				foreach($project['items'] as $item){
					$output .= '
							<tr>
								<td><span class="visible-xs-inline">' . $item['Quantity'] . 'x</span> ' . $item['Name'] . '</td>
								<td class="hidden-xs">' . @money_format('%.2n', $item['Price']) . '</td>
								<td class="hidden-xs">' . $item['Quantity'] . '</td>
								<td>' . @money_format('%.2n', $item['Cost']) . '</td>
								<td>' . @money_format('%.2n', $item['Raised']) . '</td>
								<td class="hidden-xs">' . $item['Note'] . '</td>
							</tr>';
				}
				$output .= '
						</tbody>
						<tfoot>
							<tr class="hidden-xs">
								<th colspan="3">Total</th>
								<th>' . money_format('%.2n', 0+$project['totalCost']) . '</th>
								<th>' . money_format('%.2n', 0+$project['totalRaised']) . '</th>
								<th>&nbsp;</th>
							</tr>
							<tr class="visible-xs">
								<th>Total</th>
								<th>' . money_format('%.2n', 0+$project['totalCost']) . '</th>
								<th>' . money_format('%.2n', 0+$project['totalRaised']) . '</th>
							</tr>
						</tfoot>
					</table><br/>';
			}
		}
	}
	if(empty($output)){
		$output = 'This funding project could not be found :(';
	}

	return $output;
}

function funding_projects_settings_page(){
  ?>
    <div class="wrap">
      <h2>Project Budgets</h2>
   <?php
	$apiURL = get_option('funding_projects_api_url');
	if(!empty(get_option('funding_projects_reload'))){
		if(empty($apiURL)){
			echo 'API URL must be configured :(<br/>';
		}else{
			echo 'Downloading data...<br/>';
			$projectsAsJSON = file_get_contents($apiURL);

			echo 'Decoding data...<br/>';
			$projects = json_decode($projectsAsJSON, true);
			
			echo 'Processing projects...<br/>';
			foreach($projects as $name=>$project){
				$project['totalCost'] = 0;
				$project['totalRaised'] = 0;
				foreach($project['items'] as $item){
					$project['totalCost'] += ($item['Price'] * $item['Quantity']);
					$project['totalRaised'] += $item['Raised'];
				}
				$projects[$name] = $project;
			}
			
			echo 'Saving...<br/>';
			update_option('funding_projects_list', $projects);
			update_option('funding_projects_reload', false);
			
			echo 'Done!<br/>';
		}
	}
   ?>
        <?php echo do_shortcode('[funding_project_info]'); ?>
        <h2>Settings</h2>
        <form method="post" action="options.php">
          <?php echo settings_fields('funding-projects-settings-group'); ?>
          <?php echo do_settings_sections('funding-projects-settings-group'); ?>
          <input type="hidden" name="funding_projects_reload" value="1" />
          <hr/>
          <table>
			<tr>
				<th>API URL:</th>
				<td><input type="text" name="funding_projects_api_url" value="<?php echo esc_attr(get_option('funding_projects_api_url')); ?>" /></td>
			</tr>
	      </table>
        <?php submit_button(); ?>
      </form>
    </div>
  <?php
}

function register_funding_projects_settings() {
  register_setting('funding-projects-settings-group', 'funding_projects_list');
  register_setting('funding-projects-settings-group', 'funding_projects_reload');
  register_setting('funding-projects-settings-group', 'funding_projects_api_url');
}

function funding_projects_create_menu(){
  add_menu_page(
    'Project Budgets',
    'Project Budgets',
    'administrator',
    __FILE__,
    'funding_projects_settings_page'
  );
}

add_shortcode('funding_project_info', 'funding_project_info');
add_action('admin_init', 'register_funding_projects_settings');
add_action('admin_menu', 'funding_projects_create_menu');
