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
		'project' => null
	), $atts);
	$projects = get_option('funding_projects_list');
	if(empty($projects)) return 'Project not found :(';
	$output = '';
	foreach($projects as $project){
		$noParams = empty($atts['project']) && empty($atts['children_of']);
		if($noParams || $project['Name'] == $atts['project'] || $project['Parent project'] == $atts['children_of']){
			$output .= '
				<h3>' . $project['Name'] . ' : ' . money_format('%.2n', $project['total']) . '</h3>
				<h4>' . $project['Description'] . '</h4>';
			if(count($project['items']) > 0){
				$output .= '
					<table class="bom">
						<tr>
							<th>Item</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Cost</th>
							<th>Note</th>
						</tr>';
				foreach($project['items'] as $item){
					$item['Price'] = 
					$output .= '
						<tr>
							<td>' . $item['Name'] . '</td>
							<td>' . money_format('%.2n', 0+$item['Price']) . '</td>
							<td>' . $item['Quantity'] . '</td>
							<td>' . money_format('%.2n', $item['Cost']) . '</td>
							<td>' . $item['Note'] . '</td>
						</tr>';
				}
				$output .= '
						<tr>
							<th colspan="3">Total</th>
							<th colspan="2">' . money_format('%.2n', 0+$project['total']) . '</th>
						</tr>';
				$output .= '</table>';
			}
		}
	}

	return $output;
}

function funding_projects_settings_page(){
  ?>
    <div class="wrap">
      <h2>MakeICT Project Budgets</h2>
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
				$project['total'] = 0;
				foreach($project['items'] as $item){
					$project['total'] += ($item['Price'] * $item['Quantity']);
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
    'MakeICT Project Budgets',
    'MakeICT Project Budgets',
    'administrator',
    __FILE__,
    'funding_projects_settings_page'
  );
}

add_shortcode('funding_project_info', 'funding_project_info');
add_action('admin_init', 'register_funding_projects_settings');
add_action('admin_menu', 'funding_projects_create_menu');
