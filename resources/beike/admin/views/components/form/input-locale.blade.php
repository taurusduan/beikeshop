<x-admin::form.row :title="$title" :required="$required">
<div class="input-locale-wrap">
  @foreach (locales() as $index => $locale)
    <div class="d-flex wp-{{ $width }} input-for-group">
      <span class="input-group-text wp-100 px-1" id="basic-addon1">{{ $locale['name'] }}</span>
      <input type="text" name="{{ $formatName($locale['code']) }}" value="{{ $formatValue($locale['code']) }}"
        class="form-control short input-{{ $locale['code'] }}" placeholder="{{ $placeholder ?: $locale['name'] }}" @if ($required) required @endif>
      <span class="invalid-feedback w-auto"
        style="white-space:nowrap;">{{ __('common.error_required', ['name' => $title]) }}</span>
    </div>
    @if ($attributes->has('required'))
      @error($errorKey($locale['code']))
        <x-admin::form.error :message="$message" />
      @enderror
    @endif
  @endforeach

  @include('admin::shared.auto-translation')
</div>
</x-admin::form.row>
