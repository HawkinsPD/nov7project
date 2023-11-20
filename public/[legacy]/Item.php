<?php

class Item
{
    public string $text;
    public string $style;
    public string $tag;

    public function rString(): string
    {
        $tag = $this->tag;
        $style = $this->style;
        $text = $this->text;
        return "<$tag style='$style'>$text<$tag></n>";
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): Item
    {
        $this->tag = $tag;

        return $this;
    }

    public function getStyle(): string
    {
        return $this->style;
    }


    public function setStyle(string $style): Item
    {
        $this->style = $style;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Item
    {
        $this->text = $text;

        return $this;
    }
}