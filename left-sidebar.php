<div class="col-xs-12 col-md-3 left-sidebar">
	<h5>Call for Paper</h5>
	<?php $query = mysql_query("select * from callforpaper where id = 1");
						while ($data = mysql_fetch_array($query)) {
	?>
	<p class="nomargin">
		<b><a href="<?php echo $hostname; ?>call-for-paper"> Vol. <?php echo $data['volume'] ?> No. <?php echo $data['number'] ?>, <?php echo $data['year'] ?> </a></b>
	</p>
	<p class="nomargin">
		<b><a href="<?php echo $hostname; ?>call-for-paper">Submission Last Date: <?php echo $data['lastDate'] ?></a></b>
	</p>
	<?php }?>
	<p class="nomargin">
	<!--	<b><a href="#">Status Notification : In 2 Days</a></b> -->
	</p>

	<div style="width: 100%;">
		
			<a href="<?php echo $hostname; ?>editorial-board" class="btn btn-info btn-sm"> Editorial Board </a>
		<!--	<a href="<?php echo $hostname; ?>authors-guidelines" class="btn btn-info btn-sm"> Author's Guidelines </a> -->
			<a href="<?php echo $hostname; ?>faq" class="btn btn-info btn-sm"> FAQ </a>
			<a href="<?php echo $hostname; ?>topic-covered" class="btn btn-info btn-sm"> Topic Covered </a>
				<a href="<?php echo $hostname; ?>indexing" class="btn btn-info btn-sm"> Indexing </a>
		 	<a href="<?php echo $hostname; ?>processing-charges" class="btn btn-info btn-sm">Article  Processing Charges</a> 
			<a href="<?php echo $hostname; ?>assets/templates/Manuscript-Template.docx" target="_blank" class="btn btn-info btn-sm"> Manuscript Template </a>
			<a href="<?php echo $hostname; ?>assets/templates/IJIES-Copyright form.doc" target="_blank" class="btn btn-info btn-sm"> Copyright Agreement </a>
			<a href="<?php echo $hostname; ?>submit-manuscript-online" class="btn btn-info btn-sm"> Initial Submission </a>
			<a href="<?php echo $hostname; ?>current-issue" class="btn btn-info btn-sm">Current Issue</a>
		<!--	<a href="<?php echo $hostname; ?>final-submission" class="btn btn-info btn-sm"> Final Submission </a>
		
			<a href="<?php echo $hostname; ?>impact-factor" class="btn btn-info btn-sm"> Impact Factor </a>
			<a href="<?php echo $hostname; ?>join-as-reviewer" class="btn btn-sm btn-info" > Join as Reviewer </a> -->

			<a href="<?php echo $hostname; ?>conferences" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Conferences</a>
			<a href="<?php echo $hostname; ?>books" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Books</a>
	<a href="<?php echo $hostname; ?>reviewer" class="btn btn-sm btn-info" style="width:100%; margin-bottom: 5px;">Reviewer Login</a>


<h5>Share and Like this </h5>
	<table align="center">
	<tbody>
		<tr align="center">
			<td style="padding-top: 15px; padding-bottom: 15px; padding-left: 10px; padding-right: 10px;"> <a href="https://www.facebook.com/IJIES-Journal-112899400618938/" target="_blank"> <img src="/images/001-facebook.png"> </a></td>
			<td style="padding-top: 15px; padding-bottom: 15px; padding-left: 10px; padding-right: 10px;"> <a href="https://twitter.com/IjiesJ" target="_blank"> <img src="/images/003-twitter.png"> </a> </td>
			<td style="padding-top: 15px; padding-bottom: 15px; padding-left: 10px; padding-right: 10px;"> <a href="https://www.linkedin.com/in/ijies-journal-5ab485153/" target="_blank"> <img src="/images/002-linkedin.png"> </a> </td>
		</tr>
	</tbody>
</table>
		
	</div>

</div>