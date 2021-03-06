<?php

namespace Kendo\Dataviz\UI;

class SparklineCategoryAxisItemMinorGridLines extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The color of the lines. Any valid CSS color string will work here, including hex and
rgb.Note that this setting has no effect if the visibility of the minor
grid lines is not set to true.
    * @param string $value
    * @return \Kendo\Dataviz\UI\SparklineCategoryAxisItemMinorGridLines
    */
    public function color($value) {
        return $this->setProperty('color', $value);
    }

    /**
    * The dash type of the grid lines.
    * @param string $value
    * @return \Kendo\Dataviz\UI\SparklineCategoryAxisItemMinorGridLines
    */
    public function dashType($value) {
        return $this->setProperty('dashType', $value);
    }

    /**
    * The visibility of the lines.
    * @param boolean $value
    * @return \Kendo\Dataviz\UI\SparklineCategoryAxisItemMinorGridLines
    */
    public function visible($value) {
        return $this->setProperty('visible', $value);
    }

    /**
    * The width of the lines.Note that this setting has no effect if the visibility of the minor
grid lines is not set to true.
    * @param float $value
    * @return \Kendo\Dataviz\UI\SparklineCategoryAxisItemMinorGridLines
    */
    public function width($value) {
        return $this->setProperty('width', $value);
    }

    /**
    * The step of the category axis minor grid lines.
    * @param float $value
    * @return \Kendo\Dataviz\UI\SparklineCategoryAxisItemMinorGridLines
    */
    public function step($value) {
        return $this->setProperty('step', $value);
    }

    /**
    * The skip of the category axis minor grid lines.
    * @param float $value
    * @return \Kendo\Dataviz\UI\SparklineCategoryAxisItemMinorGridLines
    */
    public function skip($value) {
        return $this->setProperty('skip', $value);
    }

//<< Properties
}

?>
