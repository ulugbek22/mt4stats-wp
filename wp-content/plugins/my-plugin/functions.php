<?php

/**
 * Parses The String Data And Return The Stats Body Part
 * @return array
 */
function get_the_stats_data( $input, $mood ) {
	$trade_num = 1;
	$buffer = $rows = [];
	$header = 'Strategy Tester Report';

	if ( strpos( $input, $header ) === false ) {
		return 'Please upload right MT4 Stats.';
	}
	$data = preg_split( "/\r\n|\n|\r/", $input );
	$header = array_splice( $data, 0, 23 );

	foreach ( $data as $item ) {
		$item = preg_split( '/\t/', $item );
		if ( $item[3] == $trade_num ) {
			$buffer[] = $item;
		} else {
			$rows[] = $buffer;
			unset( $buffer );
			$buffer[] = $item;
			$trade_num = $item[3];
		}
	}
	if ( $mood == 'header' ) {
		return serialize( $header );
	}
	if ( $mood == 'body' ) {
		return serialize( $rows );
	}
}

function get_trades_from_data( $trades ) {
	$out = $open_time = $open_time_min = $open_time_max = '';
	$wins = $losses = $bes = $cons_wins = $cons_losses = $win_buffer = $loss_buffer = $net_profit = 0;
	$profit_factor = $gross_profit = $gross_loss = $lot = $total_comission = $pl_count = 0;
	$months_arr = $months_profit_arr = [];
	for ( $i = 1; $i < count( $trades ); $i++ )
	{
		$pl_class = '';
		$lot = $trades[ $i ][ count( $trades[$i] ) - 1 ][4];
		$profit = ( int ) $trades[ $i ][ count( $trades[$i] ) - 1 ][8];
		$time = $trades[ $i ][ count( $trades[$i] ) - 1 ][1];
		if ( $i == 1 ) {
			$open_time = $open_time_min = $open_time_max = (int) substr( $trades[ $i ][0][1], 11, 2);
		}
		$open_time = ( int ) substr( $trades[ $i ][0][1], 11, 2);
		$month = substr( $time, 5, 2 );

		// require 'consecutive-win-loss-count.php';
		if ( $profit >= 100 ) {
			$wins++;
			$win_buffer++;
			$loss_buffer = 0;
			$pl_class = 'profit';
		} elseif ( $profit <= -30 ) {
			$losses++;
			$loss_buffer++;
			$win_buffer = 0;
			$pl_class = 'loss';
		} else {
			$bes++;
			$pl_class = 'be';
		}
		if ( $cons_wins < $win_buffer ) {
			$cons_wins = $win_buffer;
		}
		if ( $cons_losses < $loss_buffer ) {
			$cons_losses = $loss_buffer;
		}
		// require 'calculate-months.php';

		$out .= '<div class="' . $pl_class . '-trade trade">';
		$out .= '<span>Trade # ' . $i . '</span>';
		$out .= '<span class="' . $pl_class . ' figure"> PL $ ' . $profit . '</span> ';
		$out .= '<span>Volume ' . $lot . ' lot</class> ';
		$out .= '<span>Comission $' . $lot * 10 . '</class>';
		$out .= '<span class="time">' . $month . '</span>';
		$out .= '</div>';

		// calculate_open_time( $open_time, $profit, $i );
		// net_gross_profit_loss( $profit );
		// $total_comission += get_total_comission( $lot, $profit );
	}
	return $out;
}