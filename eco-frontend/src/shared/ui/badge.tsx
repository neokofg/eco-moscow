const Badge = ({ text = "" }) => {
  return (
    <div className="bg-background-tertiary py-1 px-3 text-content-primary font-medium rounded-full">
      {text}
    </div>
  );
};
export { Badge };
