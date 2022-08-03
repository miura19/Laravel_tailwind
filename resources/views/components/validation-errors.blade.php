<div class="mt-3 list-disc list-inside text-sm text-red-600">
    @if($errors->any())
        @if(empty($errors->first($name)))
            <li>画像ファイルがあれば、再度、選択してください。</li>
        @else
            <li>{{$errors->first($name)}}</li>
        @endif    
    @endif    
</div>
