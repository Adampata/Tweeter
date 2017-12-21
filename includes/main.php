<div style="margin-top: 10px; margin-left: 10px; font-size: 20px;">
				Co u ciebie słychać? :)
			</div>
			<div>
				<form action="" method="POST">
					<div>
						<textarea type="text" name="whatsup" 
						style=" width: 50%;
					    direction:ltr;
					    line-height:1.5;
					    padding:15px 15px 30px;
					    border-radius:3px;
					    border:1px solid #F7E98D;
					    font:13px Tahoma, cursive;
					    transition:box-shadow 0.5s ease;
					    box-shadow:0 4px 6px rgba(0,0,0,0.1);
					    font-smoothing:subpixel-antialiased;
					    margin-left: 10px;
					    margin-top: 10px;">

    				</textarea>
    			</div>
    			<div>
    				<input type="submit" name="gogogo" value="Wyślij wiadomość" style="float: right; margin-right: 50%; margin-top: 10px; margin-bottom: 20px;">
    				<input type="hidden" name="ref" value="<?php $r=random_bytes(5); echo $r; ?>">
    			</div>
    			<div style="margin-top: 60px; width: 60%;">
    				<?php
    					if (isset($tablica)) {
    						for ($i=0; $i < count($tablica); $i++) { 
    							echo '<div class="comments">'.$tablica[$i]['content'].'</div><div>'.$tablica[$i]['adDate'].' '.$tablica[$i]['property'].'</div>';
    						}
    					}
    				?>
    			</div>
				</form>
			</div>