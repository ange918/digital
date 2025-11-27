# Project: React + Vite Application

## Overview
This is a React application built with Vite. It provides a minimal setup for React development with Hot Module Replacement (HMR) and ESLint configuration.

## Setup Date
November 27, 2025 - Initial Replit environment configuration

## Project Architecture

### Technology Stack
- **Framework**: React 19.2.0
- **Build Tool**: Vite 7.2.4
- **Language**: JavaScript (JSX)
- **Package Manager**: npm

### Project Structure
```
├── public/          # Static assets
├── src/
│   ├── assets/      # React logo and other assets
│   ├── App.jsx      # Main application component
│   ├── App.css      # Application styles
│   ├── main.jsx     # Application entry point
│   └── index.css    # Global styles
├── index.html       # HTML template
├── vite.config.js   # Vite configuration
└── package.json     # Project dependencies
```

## Replit Configuration

### Development Server
- **Host**: 0.0.0.0 (configured for Replit proxy)
- **Port**: 5000
- **HMR**: WebSocket configured for Replit environment
- **Command**: `npm run dev`

### Workflow
- Name: "Start application"
- Runs the Vite dev server on port 5000
- Configured for webview output

### Deployment
- **Type**: Static site deployment
- **Build Command**: `npm run build`
- **Output Directory**: `dist/`
- Vite bundles the application for production

## Key Features
- Fast development with Vite
- React 19 with hooks
- Hot Module Replacement
- ESLint for code quality
- Optimized production builds

## Recent Changes
- **2025-11-27**: Configured Vite to run on port 5000 with host 0.0.0.0
- **2025-11-27**: Added HMR configuration for Replit proxy environment
- **2025-11-27**: Set up deployment configuration for static site hosting
- **2025-11-27**: Installed all npm dependencies

## Notes
- The application is configured to work with Replit's proxy system
- HMR (Hot Module Replacement) is enabled for instant updates during development
- The counter demo component showcases React state management
