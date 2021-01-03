<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalender':
			getCalender($_POST['year'],$_POST['month']);
			break;
		case 'getEvents':
			getEvents($_POST['date']);
			break;
		default:
			break;
	}
}
 
/*
 * Get calendar full HTML
 */
function getCalender($year = '',$month = '')
{
	$dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
?>
	<div id="calender_section">
		<h2>
        	<a style="float:left;" href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt; <?php echo date("F",strtotime($date.' - 1 Month'))?></a>
            <?php echo date("F",strtotime($date)); echo "&nbsp;"; echo $dateYear; ?>
            <a style="float:right;" href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');"><?php echo date("F",strtotime($date.' + 1 Month'))?> &gt;</a>
        </h2>
		<div id="event_list" class="none"></div>
		<div id="calender_section_top">
			<ul>
				<li>Sunday</li>
				<li>Monday</li>
				<li>Tuesday</li>
				<li>Wednesday</li>
				<li>Thursday</li>
				<li>Friday</li>
				<li>Saturday</li>
			</ul>
		</div>
		<div id="calender_section_bot">
			<ul>
			<?php 
				$dayCount = 1; 
				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
						//Current date
						$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
						//Include db configuration file
						include 'dbConfig.php';
						//Get number of events based on the current date
						$result = $con->query("SELECT status, perkara FROM kalendar WHERE tarikh_lwtn = '".$currentDate."' ");
                        $perkara='perkara';
                        $status='status';
						$eventNum = $result->num_rows;
						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
                            if(['status'] == 'lwtn'){ echo '<li date="'.$currentDate.'"  class="light_red date_cell">';
                            while($row = $result->fetch_assoc()){ 
                                $perkara=$row['perkara'];
                        }}else{
                                echo '<li date="'.$currentDate.'"  class="light_sky date_cell">';
                            while($row = $result->fetch_assoc()){ 
                                $perkara=$row['perkara'];
                            }
                            
						}}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
                            
						}
						//Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';
						include 'dbConfig.php';
						//Hover event popup
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
						echo '<div class="date_window">';
						echo ($eventNum > 0)?'<a style="    text-decoration: none;
    color: #FF0000;" href="javascript:;" onclick="(\''.$currentDate.'\');">'.$perkara.'</a>':'';
						echo '</div></div>';
						echo '</li>';
						$dayCount++;
			?>
			<?php }else{ ?>
				<li><span>&nbsp;</span></li>
			<?php } } ?>
			</ul>
		</div>
	</div>
 
	<script type="text/javascript">
		function getCalendar(target_div,year,month){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getCalender&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}
		
		function getEvents(date){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getEvents&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}
		
		function addEvent(date){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=addEvent&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}
		
		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();	
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();		
			});
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$(document).click(function(){
				$('#event_list').slideUp('slow');
			});
		});
	</script>
<?php
}
 
/*
 * Get events by date
 */
function getEvents($date = ''){
	//Include db configuration file
	include 'dbConfig.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$result = $con->query("SELECT perkara FROM kalendar WHERE tarikh_lwtn = '".$date."' ");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>'.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
            $eventListHTML .= '<li>'.$row['perkara'].'</li>';
        }
		$eventListHTML .= '</ul>';
	}
	echo $eventListHTML;
}
?>
