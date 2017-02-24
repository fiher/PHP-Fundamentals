<?php
$strings = explode(', ',trim(fgets(STDIN)));
echo stringsToXml($strings);
function stringsToXml($strings) {
    $xmlOutput = "<?xml version='1.0' encoding='UTF-8'?>\n<quiz>\n";
        for ($i = 0; $i < count($strings); $i+=2) {
        $question = $strings[$i];
            $answer = $strings[$i + 1];

            $xmlOutput .= "  <question>\n    ${question}\n  </question>\n";
            $xmlOutput .= "  <answer>\n    ${answer}\n  </answer>\n";
        }

        $xmlOutput .= '</quiz>';

        return $xmlOutput;
    }