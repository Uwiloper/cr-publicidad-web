# Rediseño Web Corporativo

![Astro](https://img.shields.io/badge/Astro-0C1127?style=for-the-badge&logo=astro&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)


Sitio web corporativo y con portafolio interactivo desarrollado para la agencia CR Publicidad. El proyecto se centra en ofrecer una experiencia de usuario fluida con tiempos de carga mínimos y nulos y un diseño atractivo e impactante

---

## Sobre el Proyecto

CR Publicidad tiene una presencia bastante sólida en producción e implementación publicitaria, especialmente en áreas como **Trade Marketing** y **Branding comercial**.

Esta página busca un nuevo nivel visual y profesional a una nueva experiencia, construyendo una plataforma más moderna, visual y adaptable tanto en desktop como en dispositivos móviles.

### Características Principales
- ✔️ **Data Binding:** Gestión de contenido local por archivos JSON (Portafolio, Servicios, Inicio) que permite actualizar la información del cliente sin necesidad de modificar el código HTML.
- ✔️ **Rendimiento y Velocidad Extrema:** Generación de sitio estático (SSG) garantizando tiempos de carga en milisegundos, optimizado para retención de clientes.
- ✔️ **Seguridad y Anti-Spam Integrado:** Formularios protegidos de manera invisible con Google reCAPTCHA.
- ✔️ **Analítica Asíncrona:** Implementación de Google Analytics ejecutado en hilos secundarios para asegurar una calificación perfecta en PageSpeed Insights.
- ✔️ **Diseño UI/UX:** Interfaz adaptativa (Mobile-First) con transiciones fluidas.

---

## 🛠️ Stack Tecnológico

**Desarrollo Frontend:**
- **Framework Core:**               [Astro](https://astro.build/)
- **Estilos y UI:**                 [TailwindCSS](https://tailwindcss.com/)
- **Interactividad y Animaciones:** [JavaScript](https://developer.mozilla.org/es/docs/Web/JavaScript)

**Infraestructura y Herramientas:**
- **Analítica de Tráfico:** [Google Analytics 4](https://analytics.google.com/) (implementación vía [Astro Partytown](https://docs.astro.build/es/guides/integrations-guide/partytown/))
- **Seguridad Web:** [Google reCAPTCHA](https://developers.google.com/recaptcha/docs/v3)
- **Base de Datos Local:** [JSON](https://www.json.org/json-es.html)
- **Hosting y Despliegue:** Servidor [DonWeb](https://donweb.com/) (CPanel/Ferozo) con forzado de protocolo HTTPS/SSL.

---

## 🎨 Sistema de Diseño (UI/UX)

El proyecto fue diseñado asegurando una consistencia visual corporativa:

**Tipografías:**
- Primaria: `Inter`
- - Para legibilidad (textos, párrafos, botones. Pesos: Light, Regular, Medium, SemiBold)
- Secundaria: `Montserrat` 
- - Exclusivamente para títulos grandes (Hero, nombres de proyectos). Aporta un toque Impactante y editorial.
- Tags: `Monospace`
- - Para etiquetas (tags), años y roles, acompañada de un espaciado amplio (`tracking-widest`) en mayúsculas.

**Paleta de Colores Base:**
- ⚪ `Background white`: `#ffffff` (Fondo principal blanco y en tema blanco)
- ⚫ `Background dark`: `#050505` (Fondo principal casi negro puro cuando se detecta el modo oscuro)
- 🌑 `Surface / Cards`: `#161c24` y `#1c232e`
- 🟠 `Acento Acción`: `#f6a316` (Naranja corporativo CR)
- 🔵 `Acento Secundario`: `#0094c9` (Azul corporativo CR)
- 🧊 `Detalles / Luces`: `#cbced6` (Gris claro)

---

## 📁 Arquitectura del Código

El sistema está diseñado bajo el principio de separación de responsabilidades, aislando la lógica de negocio, el contenido y la interfaz visual:

```text
/
├── public/                 # Archivos estáticos crudos (Favicon, video de fondo .mp4, fuentes)
├── src/
│   ├── assets/             # Recursos procesados y optimizados por Astro
│   │   ├── videos/         # Videos en alta resolución (MP4/WebM/AV1)
│   │   ├── images/         # Fotografías en alta resolución (JPG/PNG/WEBP)
│   │   └── icons/          # Gráficos vectoriales y logotipos (SVG)
│   │
│   ├── components/         # Sistema de componentes modulares
│   │   ├── ui/             # Elementos base de la interfaz (Botones, Inputs, Badges)
│   │   └── sections/       # Bloques estructurales (Hero, ServicesGrid, Footer)
│   │
│   ├── data/               # Base de datos local en formato JSON
│   │   ├── global.json     # Info compartida: Navbar, Footer, Redes, Teléfono
│   │   ├── inicio.json     # Textos y multimedia de la portada
│   │   ├── nosotros.json   # Valores, historia y línea de tiempo
│   │   ├── servicios.json  # Catálogo de unidades de negocio
│   │   ├── portafolio.json # Array de trabajos realizados y sus categorías
│   │   └── contacto.json   # Textos y configuración de la página de contacto
│   │
│   ├── layouts/            # Estructura maestra HTML y metadatos SEO
│   └── pages/              # Enrutamiento basado en archivos (File-system routing)
│
├── .env                    # Variables de entorno secretas (Ignorado en Git)
└── tailwind.config.mjs     # Configuración del Design System (Colores y tipografías)