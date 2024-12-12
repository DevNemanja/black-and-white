<?php 
    $title = get_field('sekundarni_naslov');
    $text = get_field('tekst_ispod_sekundarnog_naslova');

    
    require(get_template_directory() . '/template-parts/centered-content.php'); 

?>



<div class="assortment-links-list">
    <?php 
        $karticaNaslov = get_field('prva_kartica_naslov');
        $karticaDugmeTekst = get_field('prva_kartica_dugme_tekst');
        $karticaSlika = get_field('prva_kartica_slika');
        $karticaLink = get_field('prva_kartica_link');
        require(get_template_directory() . '/template-parts/wholesale/assortment-link.php');  
    ?>
    <?php 
        $karticaNaslov = get_field('druga_kartica_naslov');
        $karticaDugmeTekst = get_field('druga_kartica_dugme_tekst');
        $karticaSlika = get_field('druga_kartica_slika');
        $karticaLink = get_field('druga_kartica_link');
        require(get_template_directory() . '/template-parts/wholesale/assortment-link.php');  
    ?>
    <?php 
        $karticaNaslov = get_field('treca_kartica_naslov');
        $karticaDugmeTekst = get_field('treca_kartica_dugme_tekst');
        $karticaSlika = get_field('treca_kartica_slika');
        $karticaLink = get_field('treca_kartica_link');
        require(get_template_directory() . '/template-parts/wholesale/assortment-link.php');  
    ?>
</div>
