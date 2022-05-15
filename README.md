### Инструкции по установке приложения:

> Необходимо установка Docker(https://docs.docker.com/get-docker/) 
> и Docker Compose(https://docs.docker.com/compose/) на вашем устройстве.
---

1. `git clone https://github.com/bakhtiyor-dev/soato.git`
2. Переходим к папке soato, создаем файл .env и копируем из .env.example в .envdoc
3. `docker run --rm --interactive --tty --volume ${pwd}:/app composer install --ignore-platform-reqs` (в Windows только через Powershell),
4. `docker compose up`
5. перейти по localhost и нажать на установить
```