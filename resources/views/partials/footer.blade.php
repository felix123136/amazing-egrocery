<footer class="text-center py-4 mb-0" style="background-color:aquamarine;">
    <form action="/change-language" method="post" class="my-3 d-flex align-items-center justify-content-center">
        @csrf
        <select name="language">
            <option value="en" {{app()->getLocale() == "en" ? "selected" : ""}}>{{ __('footer.english') }}</option>
            <option value="id" {{app()->getLocale() == "id" ? "selected" : ""}}>{{ __('footer.indonesian') }}</option>
        </select>
        <button type="submit" class="btn btn-dark btn-sm">{{ __('footer.change') }}</button>
    </form>
    {{ __('footer.copyright') }}
</footer>
