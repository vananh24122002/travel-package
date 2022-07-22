 <!-- nav -->
 <div class="nav">
            <ul class="navul">
                <?php foreach ($dmtintuc as $dmtt) {
                    extract($dmtt);
                    $linkdm = 'index.php?view=danhmuc1&id_DMTT='.$id_DMTT;
                    echo'<li><a href="'.$linkdm.'"><span id="danhmuc">'.$nameDMTT.'</span></a></li>';
                } ?>
            </ul>
        </div>