@extends('adminlte::page')

@section('title', 'Контакты')

@section('content_header')
    <h1>Контакты</h1>
@stop
@section('content')
    <div class="card-body">
        @include('flash-message')
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/admin/contacts') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-ru-tab" data-toggle="pill" href="#custom-tabs-one-ru"
                       role="tab"
                       aria-controls="custom-tabs-one-ru" aria-selected="true">Русский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill" href="#custom-tabs-one-en"
                       role="tab"
                       aria-controls="custom-tabs-one-en" aria-selected="false">Английский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-kz-tab" data-toggle="pill" href="#custom-tabs-one-kz"
                       role="tab"
                       aria-controls="custom-tabs-one-kz" aria-selected="false">Казахский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-tr-tab" data-toggle="pill" href="#custom-tabs-one-tr"
                       role="tab"
                       aria-controls="custom-tabs-one-tr" aria-selected="false">Турецкий</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-ch-tab" data-toggle="pill" href="#custom-tabs-one-ch"
                       role="tab"
                       aria-controls="custom-tabs-one-ch" aria-selected="false">Китайский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-phr-tab" data-toggle="pill" href="#custom-tabs-one-phr"
                       role="tab"
                       aria-controls="custom-tabs-one-phr" aria-selected="false">Персидский</a>
                </li>
            </ul>

            <div class="tab-content col-md-12" id="custom-tabs-one-tabContent">
                <div class="tab-pane active in" id="custom-tabs-one-ru" role="tabpanel"
                     aria-labelledby="custom-tabs-one-ru-tab">

                    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                        <input class="form-control" name="phone_number[ru]" type="text" id="phone_number"
                               value="{{ isset($contacts->phone_number) ? $contacts->phone->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Почта' }}</label>
                        <input class="form-control" name="email[ru]" type="email" id="email"
                               value="{{ isset($contacts->email) ? $contacts->getEmail->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                        <input class="form-control" name="address[ru]" type="text" id="address"
                               value="{{ isset($contacts->address) ? $contacts->getAddress->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                        <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                        <input class="form-control" name="address2[ru]" type="text" id="address2"
                               value="{{ isset($contacts->address2) ? $contacts->getAddress2->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                        <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                        <input class="form-control" name="whats_app[ru]" type="text" id="whats_app"
                               value="{{ isset($contacts->whats_app) ? $contacts->whatsapp->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                        <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                        <input class="form-control" name="telegram[ru]" type="text" id="telegram"
                               value="{{ isset($contacts->telegram) ? $contacts->telega->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                        <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                        <input class="form-control" name="facebook[ru]" type="text" id="facebook"
                               value="{{ isset($contacts->facebook) ? $contacts->face->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                        <label for="insta" class="control-label">{{ 'instagram' }}</label>
                        <input class="form-control" name="insta[ru]" type="text" id="insta"
                               value="{{ isset($contacts->insta) ? $contacts->instagram->ru : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                        <label for="link" class="control-label">{{ 'Карта' }}</label>
                        <input class="form-control" name="link[ru]" type="text" id="link"
                               value="{{ isset($contacts->link) ? $contacts->getLink->ru : ''}}">
                    </div>

                </div>

                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                     aria-labelledby="custom-tabs-one-en-tab">

                    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                        <input class="form-control" name="phone_number[en]" type="text" id="phone_number"
                               value="{{ isset($contacts->phone_number) ? $contacts->phone->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Почта' }}</label>
                        <input class="form-control" name="email[en]" type="email" id="email"
                               value="{{ isset($contacts->email) ? $contacts->getEmail->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                        <input class="form-control" name="address[en]" type="text" id="address"
                               value="{{ isset($contacts->address) ? $contacts->getAddress->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                        <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                        <input class="form-control" name="address2[en]" type="text" id="address2"
                               value="{{ isset($contacts->address2) ? $contacts->getAddress2->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                        <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                        <input class="form-control" name="whats_app[en]" type="text" id="whats_app"
                               value="{{ isset($contacts->whats_app) ? $contacts->whatsapp->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                        <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                        <input class="form-control" name="telegram[en]" type="text" id="telegram"
                               value="{{ isset($contacts->telegram) ? $contacts->telega->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                        <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                        <input class="form-control" name="facebook[en]" type="text" id="facebook"
                               value="{{ isset($contacts->facebook) ? $contacts->face->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                        <label for="insta" class="control-label">{{ 'instagram' }}</label>
                        <input class="form-control" name="insta[en]" type="text" id="insta"
                               value="{{ isset($contacts->insta) ? $contacts->instagram->en : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                        <label for="link" class="control-label">{{ 'Карта' }}</label>
                        <input class="form-control" name="link[en]" type="text" id="link"
                               value="{{ isset($contacts->link) ? $contacts->getLink->en : ''}}">
                    </div>

                </div>

                <div class="tab-pane fade" id="custom-tabs-one-kz" role="tabpanel"
                     aria-labelledby="custom-tabs-one-kz-tab">

                    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                        <input class="form-control" name="phone_number[kz]" type="text" id="phone_number"
                               value="{{ isset($contacts->phone_number) ? $contacts->phone->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Почта' }}</label>
                        <input class="form-control" name="email[kz]" type="email" id="email"
                               value="{{ isset($contacts->email) ? $contacts->getEmail->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                        <input class="form-control" name="address[kz]" type="text" id="address"
                               value="{{ isset($contacts->address) ? $contacts->getAddress->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                        <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                        <input class="form-control" name="address2[kz]" type="text" id="address2"
                               value="{{ isset($contacts->address2) ? $contacts->getAddress2->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                        <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                        <input class="form-control" name="whats_app[kz]" type="text" id="whats_app"
                               value="{{ isset($contacts->whats_app) ? $contacts->whatsapp->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                        <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                        <input class="form-control" name="telegram[kz]" type="text" id="telegram"
                               value="{{ isset($contacts->telegram) ? $contacts->telega->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                        <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                        <input class="form-control" name="facebook[kz]" type="text" id="facebook"
                               value="{{ isset($contacts->facebook) ? $contacts->face->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                        <label for="insta" class="control-label">{{ 'instagram' }}</label>
                        <input class="form-control" name="insta[kz]" type="text" id="insta"
                               value="{{ isset($contacts->insta) ? $contacts->instagram->kz : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                        <label for="link" class="control-label">{{ 'Карта' }}</label>
                        <input class="form-control" name="link[kz]" type="text" id="link"
                               value="{{ isset($contacts->link) ? $contacts->getLink->kz : ''}}">
                    </div>

                </div>

                <div class="tab-pane fade" id="custom-tabs-one-tr" role="tabpanel"
                     aria-labelledby="custom-tabs-one-tr-tab">
                    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                        <input class="form-control" name="phone_number[tr]" type="text" id="phone_number"
                               value="{{ isset($contacts->phone_number) ? $contacts->phone->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Почта' }}</label>
                        <input class="form-control" name="email[tr]" type="email" id="email"
                               value="{{ isset($contacts->email) ? $contacts->getEmail->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                        <input class="form-control" name="address[tr]" type="text" id="address"
                               value="{{ isset($contacts->address) ? $contacts->getAddress->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                        <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                        <input class="form-control" name="address2[tr]" type="text" id="address2"
                               value="{{ isset($contacts->address2) ? $contacts->getAddress2->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                        <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                        <input class="form-control" name="whats_app[tr]" type="text" id="whats_app"
                               value="{{ isset($contacts->whats_app) ? $contacts->whatsapp->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                        <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                        <input class="form-control" name="telegram[tr]" type="text" id="telegram"
                               value="{{ isset($contacts->telegram) ? $contacts->telega->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                        <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                        <input class="form-control" name="facebook[tr]" type="text" id="facebook"
                               value="{{ isset($contacts->facebook) ? $contacts->face->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                        <label for="insta" class="control-label">{{ 'instagram' }}</label>
                        <input class="form-control" name="insta[tr]" type="text" id="insta"
                               value="{{ isset($contacts->insta) ? $contacts->instagram->tr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                        <label for="link" class="control-label">{{ 'Карта' }}</label>
                        <input class="form-control" name="link[tr]" type="text" id="link"
                               value="{{ isset($contacts->link) ? $contacts->getLink->tr : ''}}">
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-ch" role="tabpanel"
                     aria-labelledby="custom-tabs-one-ch-tab">

                    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                        <input class="form-control" name="phone_number[ch]" type="text" id="phone_number"
                               value="{{ isset($contacts->phone_number) ? $contacts->phone->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Почта' }}</label>
                        <input class="form-control" name="email[ch]" type="email" id="email"
                               value="{{ isset($contacts->email) ? $contacts->getEmail->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                        <input class="form-control" name="address[ch]" type="text" id="address"
                               value="{{ isset($contacts->address) ? $contacts->getAddress->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                        <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                        <input class="form-control" name="address2[ch]" type="text" id="address2"
                               value="{{ isset($contacts->address2) ? $contacts->getAddress2->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                        <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                        <input class="form-control" name="whats_app[ch]" type="text" id="whats_app"
                               value="{{ isset($contacts->whats_app) ? $contacts->whatsapp->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                        <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                        <input class="form-control" name="telegram[ch]" type="text" id="telegram"
                               value="{{ isset($contacts->telegram) ? $contacts->telega->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                        <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                        <input class="form-control" name="facebook[ch]" type="text" id="facebook"
                               value="{{ isset($contacts->facebook) ? $contacts->face->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                        <label for="insta" class="control-label">{{ 'instagram' }}</label>
                        <input class="form-control" name="insta[ch]" type="text" id="insta"
                               value="{{ isset($contacts->insta) ? $contacts->instagram->ch : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                        <label for="link" class="control-label">{{ 'Карта' }}</label>
                        <input class="form-control" name="link[ch]" type="text" id="link"
                               value="{{ isset($contacts->link) ? $contacts->getLink->ch : ''}}">
                    </div>

                </div>

                <div class="tab-pane fade" id="custom-tabs-one-phr" role="tabpanel"
                     aria-labelledby="custom-tabs-one-phr-tab">

                    <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                        <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                        <input class="form-control" name="phone_number[phr]" type="text" id="phone_number"
                               value="{{ isset($contacts->phone_number) ? $contacts->phone->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label for="email" class="control-label">{{ 'Почта' }}</label>
                        <input class="form-control" name="email[phr]" type="email" id="email"
                               value="{{ isset($contacts->email) ? $contacts->getEmail->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                        <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                        <input class="form-control" name="address[phr]" type="text" id="address"
                               value="{{ isset($contacts->address) ? $contacts->getAddress->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                        <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                        <input class="form-control" name="address2[phr]" type="text" id="address2"
                               value="{{ isset($contacts->address2) ? $contacts->getAddress2->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                        <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                        <input class="form-control" name="whats_app[phr]" type="text" id="whats_app"
                               value="{{ isset($contacts->whats_app) ? $contacts->whatsapp->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                        <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                        <input class="form-control" name="telegram[phr]" type="text" id="telegram"
                               value="{{ isset($contacts->telegram) ? $contacts->telega->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                        <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                        <input class="form-control" name="facebook[phr]" type="text" id="facebook"
                               value="{{ isset($contacts->facebook) ? $contacts->face->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                        <label for="insta" class="control-label">{{ 'instagram' }}</label>
                        <input class="form-control" name="insta[phr]" type="text" id="insta"
                               value="{{ isset($contacts->insta) ? $contacts->instagram->phr : ''}}">
                    </div>

                    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                        <label for="link" class="control-label">{{ 'Карта' }}</label>
                        <input class="form-control" name="link[phr]" type="text" id="link"
                               value="{{ isset($contacts->link) ? $contacts->getLink->phr : ''}}">
                    </div>

                </div>
            </div>

            <!--
            <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                <input class="form-control" name="phone_number" type="text" id="phone_number"
                       value="{{ isset($contacts->phone_number) ? $contacts->phone_number : ''}}">
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="control-label">{{ 'Почта' }}</label>
                <input class="form-control" name="email" type="email" id="email"
                       value="{{ isset($contacts->email) ? $contacts->email : ''}}">
            </div>

            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                <input class="form-control" name="address" type="text" id="address"
                       value="{{ isset($contacts->address) ? $contacts->address : ''}}">
            </div>

            <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                <input class="form-control" name="address2" type="text" id="address2"
                       value="{{ isset($contacts->address2) ? $contacts->address2 : ''}}">
            </div>

            <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                <input class="form-control" name="whats_app" type="text" id="whats_app"
                       value="{{ isset($contacts->whats_app) ? $contacts->whats_app : ''}}">
            </div>

            <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                <input class="form-control" name="telegram" type="text" id="telegram"
                       value="{{ isset($contacts->telegram) ? $contacts->telegram : ''}}">
            </div>

            <div class="form-group {{ $errors->has('wechat') ? 'has-error' : ''}}">
                <label for="facebook" class="control-label">{{ 'Wechat' }}</label>
                <input class="form-control" name="facebook" type="text" id="facebook"
                       value="{{ isset($contacts->facebook) ? $contacts->facebook : ''}}">
            </div>

            <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                <label for="insta" class="control-label">{{ 'instagram' }}</label>
                <input class="form-control" name="insta" type="text" id="insta"
                       value="{{ isset($contacts->insta) ? $contacts->insta : ''}}">
            </div>

            <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                <label for="link" class="control-label">{{ 'Карта' }}</label>
                <input class="form-control" name="link" type="text" id="link"
                       value="{{ isset($contacts->link) ? $contacts->link : ''}}">
            </div>
            -->

            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="control-label">{{ 'Описание' }}</label>
                <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($contacts->description) ? $contacts->description : ''}}</textarea>
            </div> -->

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{{ 'Сохранить' }}">
            </div>


        </form>
@endsection
