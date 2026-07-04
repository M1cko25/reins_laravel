import type { SVGAttributes } from 'react';

export default function AppLogoIcon(props: SVGAttributes<SVGElement>) {
    return (
        <svg {...props} viewBox="0 0 350 350" xmlns="http://www.w3.org/2000/svg">
            <rect width="350" height="350" fill="#0a0a0a" />
            <g stroke="none">
                <circle cx="75" cy="75" r="18" fill="#f4f4f4" />
                <circle cx="125" cy="75" r="18" fill="#f4f4f4" />
                <circle cx="175" cy="75" r="18" fill="#f4f4f4" />
                <circle cx="225" cy="75" r="18" fill="#f4f4f4" />
                <circle cx="275" cy="75" r="18" fill="#f4f4f4" />
                <circle cx="75" cy="125" r="18" fill="#f4f4f4" />
                <circle cx="125" cy="125" r="18" fill="#2a2a2a" />
                <circle cx="175" cy="125" r="18" fill="#2a2a2a" />
                <circle cx="225" cy="125" r="18" fill="#2a2a2a" />
                <circle cx="275" cy="125" r="18" fill="#f4f4f4" />
                <circle cx="75" cy="175" r="18" fill="#f4f4f4" />
                <circle cx="125" cy="175" r="18" fill="#2a2a2a" />
                <circle cx="175" cy="175" r="18" fill="#f4f4f4" />
                <circle cx="225" cy="175" r="18" fill="#2a2a2a" />
                <circle cx="275" cy="175" r="18" fill="#f4f4f4" />
                <circle cx="75" cy="225" r="18" fill="#f4f4f4" />
                <circle cx="125" cy="225" r="18" fill="#2a2a2a" />
                <circle cx="175" cy="225" r="18" fill="#2a2a2a" />
                <circle cx="225" cy="225" r="18" fill="#f4f4f4" />
                <circle cx="275" cy="225" r="18" fill="#2a2a2a" />
                <circle cx="75" cy="275" r="18" fill="#f4f4f4" />
                <circle cx="125" cy="275" r="18" fill="#2a2a2a" />
                <circle cx="175" cy="275" r="18" fill="#2a2a2a" />
                <circle cx="225" cy="275" r="18" fill="#2a2a2a" />
                <circle cx="275" cy="275" r="18" fill="#f4f4f4" />
            </g>
        </svg>
    );
}