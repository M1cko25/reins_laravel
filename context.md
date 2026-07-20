# Reins — Project Management Platform (Jira-like)

Reins is a Jira-like project management application built with **Laravel 13**, **React 19**, **Inertia.js v3**, and **Tailwind CSS v4** utilizing Shadcn and custom components.

---

## 🛠️ Tech Stack & Ecosystem

### Backend (PHP 8.4 / Laravel 13)
*   **Laravel 13**: High-performance backend framework.
*   **Laravel Fortify**: Headless authentication engine configured for logins, registrations, passwords, and security setup.
*   **Laravel Wayfinder**: Auto-generates type-safe route helper functions for the React frontend, avoiding hardcoded URLs.
*   **Spatie Laravel Packages**:
    *   `spatie/laravel-permission`: Role & Permission mapping.
    *   `spatie/laravel-activitylog`: Logging user activities.
    *   `spatie/laravel-medialibrary`: Managing files & attachments.
    *   `spatie/laravel-model-status`: Tracking status history on models.
*   **UUID Support**: `dyrynda/laravel-model-uuid` for secure, non-sequential database IDs.
*   **Pest PHP v4**: Modern, expressive testing framework.

### Frontend (React 19 / Inertia.js v3)
*   **React 19**: Modern declarative UI library.
*   **Inertia.js v3**: Stands as the glue for a modern, client-side rendered Single Page Application (SPA) without API complexity. Features include:
    *   `useHttp` hook for standalone XHR requests (replacing Axios).
    *   Deferred props, optimistic updates, prefetching, and polling.
*   **Tailwind CSS v4**: Utility-first CSS using compile-time optimization via `@tailwindcss/vite`.
*   **Radix UI / Shadcn UI**: High-quality accessibility primitives for buttons, alerts, dialogs, dropdowns, sheets, and sidebars.
*   **Drag & Drop (Kanban)**: Integrated with `@dnd-kit/core` and `@dnd-kit/sortable` for the boards.
*   **Passkeys (WebAuthn)**: Managed via `@laravel/passkeys` for secure, passwordless authentication.

---

## 📁 Directory Structure

```
.
├── app/                        # PHP application source code
│   ├── Actions/                # Business logic actions (Fortify auth, team creation)
│   ├── Concerns/               # Reusable Traits (e.g., HasTeams)
│   ├── Enums/                  # PHP Enums (e.g., TeamRole, TeamPermission)
│   ├── Http/                   # Controllers, Middleware, Request validation
│   │   ├── Controllers/        # Dashboard, Teams, Settings controllers
│   │   └── Middleware/         # Custom route guards (e.g., EnsureTeamMembership)
│   ├── Models/                 # Eloquent Models (User, Team, Projects, Membership)
│   └── Providers/              # App service providers
├── config/                     # Core Laravel configuration files
├── database/                   # Database files
│   ├── factories/              # Eloquent factories for test seed data
│   ├── migrations/             # Schema definitions (Users, Teams, Projects)
│   └── seeders/                # Default and mock database seeders
├── resources/                  # Frontend source code
│   ├── css/                    # Main styles (index.css with Tailwind imports)
│   └── js/                     # React application
│       ├── actions/            # Auto-generated Wayfinder typed action calls
│       ├── components/         # Shared and modular UI components
│       │   ├── reui/           # Advanced custom components (Kanban, Stepper)
│       │   └── ui/             # Standard Shadcn UI components
│       ├── hooks/              # Custom React hooks
│       ├── layouts/            # Theme layout systems (sidebar, header, settings)
│       ├── pages/              # Inertia page views (Auth, Dashboard, Settings, Teams)
│       ├── routes/             # Auto-generated Wayfinder typed route strings
│       └── types/              # TypeScript declarations (auth.ts, teams.ts, etc.)
├── routes/                     # Route definitions
│   ├── console.php             # Console commands
│   ├── settings.php            # Security, Team, Profile settings routes
│   └── web.php                 # Main dashboard and application routes
└── tests/                      # Test suites
    └── Feature/                # Pest feature tests grouped by module
```

---

## 🔑 Key Features & Core Logic

### 1. Multi-Tenant Team Architecture
*   Users can belong to multiple teams and switch between them seamlessly.
*   Application routes are scoped using a team prefix: `/{current_team}/dashboard`.
*   Access and action authorization is governed by custom permissions defined in `App\Enums\TeamPermission`.
*   Permissions are grouped under standard roles (`owner`, `admin`, `member`) defined in `App\Enums\TeamRole`.
*   The `App\Concerns\HasTeams` trait attaches team-related relations and utilities to the `User` model.

### 2. Authentication & Security
*   **Fortify Integration**: Authenticates routes and manages password resets and email verification.
*   **Multi-Factor (2FA)**: Fully supported with TOTP QR codes and recovery code setup.
*   **WebAuthn Passkeys**: Users can register and login using modern passwordless passkeys.

### 3. Kanban Drag-and-Drop Board (`resources/js/components/reui/kanban.tsx`)
*   An advanced drag-and-drop system built specifically for task boards using `@dnd-kit`.
*   Supports both column sorting and card reordering within columns, maintaining a clean React context.

---

## 📌 Coding Standards & Conventions

### PHP Rules
*   **Strict Typing**: Every method parameters and returns must use explicit typehints:
    `public function isAccessible(User $user, ?string $path = null): bool`
*   **Constructor Promotion**: Use PHP 8 constructor property promotion:
    `public function __construct(public Team $team) {}`
*   **Formatting**: Format backend PHP using Laravel Pint:
    `vendor/bin/pint --format agent`

### JavaScript / TypeScript Rules
*   **Wayfinder Route Resolvers**: Never hardcode URLs. Always import the route generator functions from `@/actions` or `@/routes` (e.g., `dashboard(props.currentTeam.slug)`).
*   **Prettier & ESLint**: Ensure all React/TS code is fully linted before commits.
