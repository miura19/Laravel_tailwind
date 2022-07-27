<div class="mt-3 list-disc list-inside text-sm text-red-600">
    @if ($errors->has($name))
        <li>{{$errors->first($name)}}</li>
    @endif
</div>

