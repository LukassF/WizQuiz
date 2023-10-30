<?php

interface ExecutableI {
    public function execute(string $method);
}

interface DelegatorI {
    public function createClass(string $request);
}
