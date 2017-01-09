<?php
return [
		'inputContainer' => '<div class="form-group">{{content}}</div>',
		'input' => '<input data-toggle="tooltip" data-placement="bottom" class="form-control" type="{{type}}" name="{{name}}" {{attrs}}>',
		'inputSubmit' => '<input class="btn btn-primary" type="{{type}}" {{attrs}} >',
		'select' => '<select class="form-control" name="{{name}}" {{attrs}}>{{content}}</select>',
		'textarea'=>' <textarea class="form-control" name="{{name}}" {{attrs}} rows="3">{{value}}</textarea>',
		'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple" {{attrs}}>{{content}}</select>',
		'label' => '<label  {{attrs}}>{{text}}</label>',
		//'dateWidget' => '<input type="text" class="datetime" name="{{name}}"{{attrs}}/>'
		'dateWidget' =>'{{day}}{{month}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}'
];