# auth api test
Необходимо написать функционал для авторизации пользователя с фронтенда по API.

Роут с адресом `/auth/login/`

Принимает параметры:
`email`
`password`

При успешной авторизации, возвращает:
`access_token` `refresh_token` `expires_in` (время жизни access_token)

В случае ошибки авторизации, формат ответа на усмотрение исполнителя.

> Для авторизации использован [Laravel Passport](https://laravel.com/docs/master/passport) и [websanova/vue-auth](https://github.com/websanova/vue-auth)

### todo
- [ ] Обработка ошибок через axios.interceptor
- [ ] Вывод ошибок на страницу
