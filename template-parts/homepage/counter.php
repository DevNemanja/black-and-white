<?php 
    $prviBroj = get_field('prvi_broj'); // Logo image
    $drugiBroj = get_field('drugi_broj'); // Logo image
    $treciBroj = get_field('treci_broj'); // Logo image
    
    $prviBrojText = get_field('prvi_broj_tekst'); // Logo image
    $drugiBrojText = get_field('drugi_broj_tekst'); // Logo image
    $treciBrojText = get_field('treci_broj_tekst'); // Logo image
?>

<section class="counter">
    <div class="container">
        <div class="counter-wrapper">
            <div class="counter-number-wrapper">
                <span class="counter-number">
                    <?php echo $prviBroj; ?>
                </span>
                
                <p class="counter-text">
                    <?php echo $prviBrojText; ?>
                </p>           
            </div>

            <div class="counter-divider"></div>
            
            <div class="counter-number-wrapper">
                <span class="counter-number">
                    <?php echo $drugiBroj; ?>
                </span>
                
                <p class="counter-text">
                    <?php echo $drugiBrojText; ?>
                </p>           
            </div>

            <div class="counter-divider"></div>
            
            <div class="counter-number-wrapper">
                <span class="counter-number">
                    <?php echo $treciBroj; ?>
                </span>
                
                <p class="counter-text">
                    <?php echo $treciBrojText; ?>
                </p>           
            </div>
        </div>
    </div>
</section>
