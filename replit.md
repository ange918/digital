# React + Vite Project

## Overview
This is a React application built with Vite, providing a minimal setup with Hot Module Replacement (HMR) and ESLint rules.

## Project Structure
```
├── public/           # Static assets
│   └── vite.svg
├── src/              # Source code
│   ├── assets/       # React assets
│   ├── App.jsx       # Main App component
│   ├── App.css       # App styles
│   ├── main.jsx      # Application entry point
│   └── index.css     # Global styles
├── index.html        # HTML template
├── vite.config.js    # Vite configuration
├── eslint.config.js  # ESLint configuration
└── package.json      # Dependencies and scripts
```

## Development
- **Start dev server**: `npm run dev` (runs on port 5000)
- **Build for production**: `npm run build`
- **Preview production build**: `npm run preview`
- **Lint code**: `npm run lint`

## Configuration
The Vite configuration has been set up for Replit with:
- Host: `0.0.0.0` for external access
- Port: `5000` for Replit compatibility
- `allowedHosts: true` for Replit proxy support
- WebSocket HMR configured for HTTPS

## Deployment
Configured for static deployment with:
- Build command: `npm run build`
- Output directory: `dist`
