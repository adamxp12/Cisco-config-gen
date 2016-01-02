<?php include_once('inc/header.php');?>

<div class="row content" data-equalizer>
	<div class="medium-5 columns panel" data-equalizer-watch>
		<h1>Cisco Config Generator</h1>
		<p>This is a simple script that generates XML config files for Cisco IP phones, mainly the 7941G but will work with similar models.</p>
		<p>This was designed to be used with SIP phones and assumes you have the correct firmware downloaded to the server for your phone and you know the file name.</p>
		<p>No Config Files are saved, the code for this site is on <a href="https://github.com/adamxp12/Cisco-config-gen">GitHub</a> if you don't trust my server.</p>
		<p>This is not an advanced generator by any means due to limited amount of time to work on it.</p>

	</div>
	<div class="medium-7 columns panel" data-equalizer-watch>
		<form action="makeconfig.php" method="POST">
			<label>SIP IP
				<input type="text" name="sipip" placeholder="192.168.0.20" required />
			</label>
			<label>SIP ID (Usually Extension Number)
				<input type="text" name="sipid" placeholder="134" required />
			</label>
			<label>SIP Password
				<input type="password" name="sippass" placeholder="1234isAbadPassword" required />
			</label>
			<label>Phone Label (Name on top bar of phone)
				<input type="text" name="phonelabel" placeholder="Adam Blunt Inc" required />
			</label>
			<label>Firmware File
				<input type="text" name="fwfile" placeholder="SIP41.8-2-1S" required />
			</label>
			<input type="submit" value="Make Basic Config" class="button" />
		</form>
	</div>
</div>

<?php include_once('inc/footer.php');?>