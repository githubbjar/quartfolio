export const allImages = import.meta.glob(
  '../images/**/*.{png,jpg,jpeg,svg,gif,webp,avif,ico}',
  {
    eager: true,
    query: '?url',
    import: 'default',
  }
);
