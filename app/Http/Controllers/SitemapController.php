{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>https://gattostello.it/</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://gattostello.it/chi-siamo</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>https://gattostello.it/adotta</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>https://gattostello.it/ex-ospiti</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>https://gattostello.it/sostienici</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>


    {{-- Pagine dei singoli gatti --}}
    @foreach($cats as $cat)

        <url>
            <loc>https://gattostello.it/adotta/{{ $cat->slug }}</loc>

            @if($cat->updated_at)
                <lastmod>{{ $cat->updated_at->toDateString() }}</lastmod>
            @endif

            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>

    @endforeach


</urlset>