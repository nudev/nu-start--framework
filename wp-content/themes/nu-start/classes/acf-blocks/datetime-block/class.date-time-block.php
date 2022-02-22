<?php
/**
 * 
 */
// 


class NU_DateTime_Helper
{

	private static $fields;

	
	function __construct($fields){

		self::$fields = $fields;

	}

	public static function build_datetime_return_string(){

		$fields = self::$fields['event_item_metadata'];

		$return = '';
		$guides = [];
		$guides['single-day'] = '
			<div class="nu__datetime">
				%2$s
				%1$s
			</div>
		';
		$guides['multiple-days'] = '
			<div class="nu__datetime">
				%2$s
				%1$s
			</div>
		';


		// $date_format = "m/d/Y";
		$date_format = "M d";
		$time_format = 'g:i a';

		
		if( !empty($fields['spans_multiple_days']) ){
			
			$startsOn = $fields['multiple_days']['starts_on'] ? '<span class="nu__datetime-startson">'. DateTime::createFromFormat('Ymd', $fields['multiple_days']['starts_on'] )->format($date_format) . '</span>' : '';
			$endsOn = $fields['multiple_days']['ends_on'] ? '<span class="nu__datetime-startson">'. DateTime::createFromFormat('Ymd', $fields['multiple_days']['ends_on'] )->format($date_format) . '</span>' : '';
			$startsAt = !empty($fields['multiple_days']['starts_at']) ? '<span class="nu__datetime-startsat">'. DateTime::createFromFormat('H:i:s', $fields['multiple_days']['starts_at'] )->format($time_format) . '</span>' : '';
			$endsAt = !empty($fields['multiple_days']['ends_at']) ? ' - <span>'. DateTime::createFromFormat('H:i:s', $fields['multiple_days']['ends_at'] )->format($time_format) . '</span>' : '';
			
			$return .= sprintf(
				$guides['multiple-days']
				,!empty($startsAt) || !empty($endsAt) ? '<p class="nu__datetime-times has-smaller-font-size">'.$startsAt . $endsAt . '</p>' : ''
				,!empty($startsOn) || !empty($endsOn) ? '<p class="nu__datetime-dates has-smaller-font-size">'.$startsOn .' - '. $endsOn . '</p>' : ''
			);
			
		} else {

			$happensOn = !empty( $fields['one_day']['happens_on'] ) ? '<p class="nu__datetime-dates has-smaller-font-size"><span class="nu__datetime-startsat">'. DateTime::createFromFormat('Ymd', $fields['one_day']['happens_on'] )->format($date_format) . '</span></p>' : '';
			$startsAt = !empty($fields['one_day']['starts_at']) ? '<span class="nu__datetime-startson">'. DateTime::createFromFormat('H:i:s', $fields['one_day']['starts_at'] )->format($time_format) . '</span>' : '';
			$endsAt = !empty($fields['one_day']['ends_at']) ? ' - <span>'. DateTime::createFromFormat('H:i:s', $fields['one_day']['ends_at'] )->format($time_format) . '</span>' : '';
			
			$return .= sprintf(
				$guides['single-day']
				,!empty($startsAt) || !empty($endsAt) ? '<p class="nu__datetime-times has-smaller-font-size">'.$startsAt . $endsAt . '</p>' : ''
				,$happensOn
			);

		}

		return $return;
		
	}

	
}

// 
?>