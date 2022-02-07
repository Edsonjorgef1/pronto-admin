# Pronto Fuel

Pronto Fuel is a heavilly opnionated starter kit for Laravel powered by Vite. It ships with autoimporting features and leverages the latest and greatest features from Vue 3, like Script Setup, integrating everything with Inertia.js.

## Quick Start

```
git clone git@github.com:prontostack/pronto-fuel.git
cp .env.example .env
composer install
npm install
npm run dev
sail up -d
sail artisan key:generate
sail artisan migrate:fresh --seed
```
