<?php
abstract class DomainObject {
    public static function create() {
        //return new static();
        return new self();
    }
}

class User extends DomainObject {
}

class Document extends DomainObject {
}
var_dump(Document::create());
