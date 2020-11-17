<!--svg  xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 <?=$size?> <?=$size?>">
    <?php foreach($grid as $rowIndex => $row): ?>
        <?php foreach($row as $colIndex => $color): ?>
            <?php if ($color): ?>
                <rect x="<?=$colIndex;?>" y="<?=$rowIndex;?>" height="1" width="1" fill="<?=$color?>"/>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</svg-->

<svg  xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 <?=$size?> <?=$size?>">
    <?php foreach($grid as $colIndex => $col): ?>
    <?php foreach($col as $rowIndex => $color): ?>
    <?php if ($color): ?>
    <rect x="<?=$colIndex;?>" y="<?=$rowIndex;?>" height="1" width="1" fill="<?=$color?>"/>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>
</svg>

<!--svg viewBox="0 0 3 3">
    <rect x="0" y="0" height="1" width="1" fill="rgb(123,222,208)"/>
    <rect x="0" y="1" height="1" width="1" fill="rgb(123,222,208)"/>
    <rect x="0" y="2" height="1" width="1" fill="rgb(123,222,208)"/>
    <rect x="1" y="0" height="1" width="1" fill="rgb(183,127,215)"/>
    <rect x="1" y="1" height="1" width="1" fill="rgb(123,222,208)"/>
    <rect x="1" y="2" height="1" width="1" fill="rgb(183,127,215)"/>
    <rect x="2" y="0" height="1" width="1" fill="rgb(123,222,208)"/>
    <rect x="2" y="1" height="1" width="1" fill="rgb(123,222,208)"/>
    <rect x="2" y="2" height="1" width="1" fill="rgb(123,222,208)"/>
</svg-->