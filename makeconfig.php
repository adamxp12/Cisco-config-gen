<?php include_once('inc/header.php');?>

<?php 
	$sipip = htmlspecialchars($_POST["sipip"]);
	$sipid = htmlspecialchars($_POST["sipid"]);
	$sippass = htmlspecialchars($_POST["sippass"]);
	$phonelabel = htmlspecialchars($_POST["phonelabel"]);
	$fwfile = htmlspecialchars($_POST["fwfile"]);

?>


<div class="row content" data-equalizer>
	<div class="medium-5 columns panel" data-equalizer-watch>
		<h1>Success :D</h1>
		<p>Your new config is in the box on the right, This config file has been tested working on a Cisco 7941G running SIP41.8-2-1S.</p>
		<p>Note: The voicemail extension is <kbd>*98</kbd> this is default in asterisk (or was when I used it) but can be changed if your using 3CX or some other PBX server.</p>
		<p>The date and time is formated for the UK, this and the time zone can be changed at top of the config file.</p>	
		<p>Just upload this file to your TFTP server and name it <kbd>SEPXXXXXXXXXXX.cnf.xml</kbd> But replace the X's with the MAC address of your phone, this is on a small label on the bottom of the phone.</p>
		<p>I will provide a small amount of technical support via e-mail (look on blog or portfolio for latest address) but don't expect miracles as I have little experience with these phones only owning one myself.</p>

	</div>
	<div class="medium-7 columns panel" data-equalizer-watch>
		<div class="alert-box warning">I have only tested this config with a 7941G, it should work with other phones but be sure to read the stuff on the left first otherwise you will have some issues</div>
		<textarea style="height:600px" readonly>
<device> 
	<deviceProtocol>SIP</deviceProtocol> 
	<sshUserId>cisco</sshUserId> 
	<sshPassword>cisco</sshPassword> 
	<devicePool> 
		<dateTimeSetting> 
			<dateTemplate>D-M-Y</dateTemplate> 
			<timeZone>Central European Time</timeZone> 
			<ntps> 
				<ntp> 
					<name>dk.pool.ntp.org</name> 
				</ntp> 
			</ntps> 
		</dateTimeSetting> 
		<callManagerGroup> 
			<members> 
				<member priority="0"> 
					<callManager> 
						<ports> 
							<ethernetPhonePort>2000</ethernetPhonePort> 
							<sipPort>5060</sipPort> 
							<securedSipPort>5061</securedSipPort> 
						</ports> 
						<processNodeName><?php echo $sipip;?></processNodeName> 
					</callManager> 
				</member> 
			</members> 
		</callManagerGroup> 
	</devicePool> 
	<sipProfile> 
		<sipProxies> 
			<registerWithProxy>true</registerWithProxy> 
		</sipProxies> 
		<enableVad>false</enableVad> 
		<!—Note – This may need to be just g711 in later firmware versions --> 
		<preferredCodec>g711ulaw</preferredCodec> 
		<natEnabled>false</natEnabled> 
		<phoneLabel><?php echo $phonelabel;?></phoneLabel> 
		<sipLines> 
			<line button="1"> 
				<featureID>9</featureID> 
				<featureLabel><?php echo $sipid;?></featureLabel> 
				<proxy><?php echo $sipip;?></proxy> 
				<name><?php echo $sipid;?></name> 
				<displayName>Line 1</displayName> 
				<authName><?php echo $sipid;?></authName> 
				<authPassword><?php echo $sippass;?></authPassword> 
				<messagesNumber>*98</messagesNumber> 
			</line> 
			<line button="2"> 
				<featureID>21</featureID> 
				<featureLabel>Voicemail</featureLabel> 
				<speedDialNumber>*98</speedDialNumber> 
			</line> 
		</sipLines> 
		<dialTemplate>DRdialplan.xml</dialTemplate> 
	</sipProfile> 
	<commonProfile> 
		<phonePassword></phonePassword> 
	</commonProfile> 
	<loadInformation><?php echo $fwfile;?></loadInformation> 
	<versionStamp>1143565489-a3cbf294-7526-4c29-8791-c4fce4ce4c37</versionStamp> 
	<directoryURL></directoryURL> 
	<servicesURL></servicesURL> 
</device> 

		</textarea>
	</div>
</div>

<?php include_once('inc/footer.php');?>