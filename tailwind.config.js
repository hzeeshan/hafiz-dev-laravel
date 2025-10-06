/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'Inter', 'system-ui', 'sans-serif'],
      },
      colors: {
        darkBg: {
          DEFAULT: '#1e1e28',
          secondary: '#252540',
        },
        darkCard: {
          DEFAULT: '#2b2b40',
          hover: '#323254',
        },
        gold: {
          DEFAULT: '#c9aa71',
          light: '#d4ba8e',
          dark: '#b89a5f',
        },
        light: {
          DEFAULT: '#e4e6ea',
          muted: '#a8a8b8',
        },
      },
      boxShadow: {
        'dark-card': '0 8px 32px rgba(0, 0, 0, 0.4), inset 0 1px 0 rgba(255, 255, 255, 0.1)',
        'dark-card-hover': '0 12px 40px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.15)',
        'gold': '0 8px 24px rgba(201, 170, 113, 0.3)',
        'gold-glow': '0 0 20px rgba(201, 170, 113, 0.4)',
      },
      backgroundImage: {
        'gradient-dark': 'linear-gradient(135deg, #1e1e28 0%, #252540 100%)',
        'gradient-card': 'linear-gradient(145deg, #2b2b40, #323254)',
        'gradient-gold': 'linear-gradient(135deg, #b89a5f, #d4ba8e)',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
