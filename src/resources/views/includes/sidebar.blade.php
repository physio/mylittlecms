
                            <h4>Cerca</h4>
                            <form action="http://www.google.com/search" class="searchform" method="get" name="searchform" target="_blank">
                                <input name="sitesearch" type="hidden" value="www.ancisa.it">
                                <input autocomplete="on" class="form-controls search no-margin-bottom name="q" placeholder="Cerca in ancisa.it" required="required"  type="text">
                                <button class="button" type="submit">Cerca</button>
                            </form>

                            <h4>Notizie Recenti</h4>
                            <ul>
                                @foreach ($news as $row)
                                <li>
                                    <div class="post-title no-thumbnail">
                                        <a href="/news/{{ $row->slug }}">{{ $row->title }}</a>
                                        <span class="date">{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y') }}</span>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
