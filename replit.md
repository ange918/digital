# JRC DIGIT - Agence Digitale

## Overview
JRC DIGIT is a professional digital agency website built with vanilla Vite (HTML/CSS/JS). The site showcases web development, graphic design, and music production services with a clean black and white aesthetic.

## Project Structure
```
├── src/
│   ├── assets/
│   │   ├── css/
│   │   │   └── style.css       # Global styles (black/white palette)
│   │   ├── js/
│   │   │   └── main.js         # Menu, animations, portfolio filter
│   │   └── img/                # Image assets
│   ├── index.html              # Homepage
│   ├── about.html              # About page
│   ├── services.html           # Services overview
│   ├── service-web.html        # Web development service
│   ├── service-flyers.html     # Graphic design service
│   ├── service-chanson.html    # Music production service
│   ├── portfolio.html          # Portfolio with filters
│   └── contact.html            # Contact form & map
├── public/                     # Static assets
├── vite.config.js              # Multi-page Vite configuration
└── package.json                # Dependencies
```

## Features
- **Responsive Design**: Mobile-first approach with hamburger menu
- **Portfolio Filtering**: Filter projects by category (Web, Flyers, Music)
- **Scroll Animations**: Fade-in effects on scroll
- **Sticky Header**: Header with scroll shadow effect
- **Tools Marquee**: Animated scrolling banner for each service
- **Contact Form**: Form with validation (frontend only)
- **Google Maps**: Embedded location map

## Design
- **Palette**: Black (#000) on White (#fff)
- **Icons**: Boxicons (CDN)
- **Typography**: Uppercase titles, Segoe UI font family
- **Animations**: CSS transitions and keyframe animations

## Development
- **Start dev server**: `npm run dev` (runs on port 5000)
- **Build for production**: `npm run build`
- **Preview production build**: `npm run preview`

## Configuration
Vite is configured for Replit with:
- Root: `src/` directory
- Multi-page setup with rollup inputs
- Host: `0.0.0.0` for external access
- Port: `5000` for Replit compatibility
- `allowedHosts: true` for Replit proxy support

## Deployment
Configured for static deployment with:
- Build command: `npm run build`
- Output directory: `dist`
