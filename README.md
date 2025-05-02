# 🌦️ API Portfolio de Clima - Laravel + SOLID + Swagger

Este proyecto contiene una colección de **mini servicios API** creados en Laravel 12, siguiendo buenas prácticas, principios **SOLID**, y organizados con arquitectura limpia.

Incluye consumo de servicios REST, SOAP y WebSocket relacionados con el clima, ideal para demostrar habilidades en desarrollo backend profesional con PHP 8+ y Laravel.

---

## 🧱 Mini Proyectos Incluidos

| Proyecto                          | Tipo       | Descripción                                                                 |
|----------------------------------|------------|-----------------------------------------------------------------------------|
| `openweather`                    | REST API   | Consulta de clima actual por ciudad usando la API real de OpenWeatherMap.  |
| `country-info`                   | SOAP API   | Consumo de API SOAP pública para obtener información de países.            |
| `websocket-weather`              | WebSocket  | Simulación de datos de clima vía WebSocket con conexión real.              |

---

## 🚀 Tecnologías y prácticas aplicadas

- Laravel 12
- PHP 8.2+
- Arquitectura limpia: Controller → Service → Repository → DTO
- Buenas prácticas y principios SOLID
- Consumo de APIs externas (REST, SOAP, WebSocket)
- Documentación automática con Swagger (OpenAPI)
- Laravel Sail (Docker)

---

## 📦 Requisitos

- Docker + Docker Compose
- Composer

---

## ⚙️ Instalación con Sail

```bash
git clone https://github.com/tuusuario/portfolio-clima.git
cd portfolio-clima

# Instalación inicial
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail artisan key:generate

# Si usas OpenWeatherMap:
# Agrega tu clave en el archivo .env
OPENWEATHER_API_KEY=tu_api_key_aqui
```
## 📑 Documentación Swagger

Una vez arrancado el proyecto, accede a:

👉 [`http://localhost/api/documentation`](http://localhost/api/documentation)

Ahí encontrarás toda la documentación generada con Swagger/OpenAPI para probar los endpoints directamente desde el navegador.


## 🧪 Endpoints principales

### 🌤 OpenWeatherMap - REST API

```bash
GET /api/openweather?city=Paris
```

### 🧴 CountryInfo - SOAP API

```bash
GET /api/soap/country-info?iso=FR
```

### 📡 Clima simulado - WebSocket

```bash
GET /api/websocket/weather
```

## 🧾 Licencia

MIT – Puedes usar este código libremente con fines educativos o profesionales.

---

## 🤝 Autor

**Roberto Ruiz Vázquez**  
Desarrollador Backend | Laravel | PHP | APIs  
[🔗 LinkedIn](https://www.linkedin.com/in/robertoruizvazquez/)
