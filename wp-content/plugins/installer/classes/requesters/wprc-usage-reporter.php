<?php

/**
 * Manage extensions usage data
 */
class WPRC_UsageReporter extends WPRC_Requester {

	/**
	 * Send report to the server
	 * 
	 * @param array report
	 */ 
	public function sendRequest( array $report ) {

		// validate input data
        if(!array_key_exists('request', $report))
        {
            return false;
        }
        
        if(!array_key_exists('reports', $report['request']))
        { 
            return false;
        }

        $response = $this->RepositoryConnector->sendWPRCRequest('post', $report);
        
		if(!$response)
		{
		    return false;
		}

		return $response;

	}


	/**
	 * Prepare report data
	 *
	 * @param array input data
	 */    
	public function prepareRequest( array $input_data ) {

		if ( ! ( $timer = get_option('iwcr_usages_sending_month_day') ) ) {
			// Choose one day of the month between 2 and 27.
			// We'll not send usage reports out of those days
			$timer = str_pad( rand(2,27), 2, '0', STR_PAD_LEFT );
			update_option( 'iwcr_usages_sending_month_day', $timer );
		}

		// Current dates formats
		$current_date = date( 'Y-m-d G:i:s' );
		$current_day_ts = strtotime( $current_date );
		

		// Next usage data request date formats
		$next_usage_request = date( 'Y-m-', $current_day_ts ) . $timer;
		$next_usage_request_ts = strtotime($next_usage_request);

		if ( $next_usage_request_ts < $current_day_ts ) {
			
			// If day has passed away, we'll send the report next month
			$next_month_date = strtotime( 'first day of next month', $next_usage_request_ts );

			unset( $next_usage_request );
			$next_usage_request = date( 'Y-m-', $next_month_date ) . $timer;
			$next_usage_request_ts = strtotime( $next_usage_request );

		}
		

		
		
		if ( ! get_transient( 'wprc_usage_reports' ) ) {

			// Seconds to next usage report request
			$seconds_to_next_report = $next_usage_request_ts - $current_day_ts;

			set_transient( 'wprc_usage_reports', true, $seconds_to_next_report );

			// get data of all plugins
	        WPRC_Loader::includeExtensionDataManager();
	        $all_data = WPRC_ExtensionDataManager::getAllData('extension');

	        $value = array();
	        $report = $this -> search_key( $all_data, 'activated_extensions' );

			$raw_report_data = array(
	            'reports' => $report
	        );

			if ( ! is_array($report) )
				return false;

	        $report = $this->formRequestStructure($raw_report_data);

	        return $report;


		}

		return false;
		

	}



	/**
	 * Form the structure of the report
	 * 
	 * @param array report data array
	 */   
	public function formRequestStructure( array $report_data ) {

        return $report = array(
	        'action' => 'usage_report',
	        'request' => array(
	            'reports' => $report_data['reports']
	            )
        );
        
	}

	/**
	 * Searches for a key in an array and returns that array[key]
	 */
	private function search_key($array, $key )
	{
	    $results = array();

	    if (is_array($array))
	    {
	        if (isset($array[$key])) {
	            $results = $array[$key];
	        }

	        foreach ($array as $subarray)
	            $results = array_merge($results, $this -> search_key( $subarray, $key ));
	    }

	    return $results;
	}


}




?>