export default function ({
  er,
  defaultMessage,
}) {
  const data = {
    success: false,
    message: defaultMessage
  }

  if (er.response && er.response.data) {
    data.message = er.response.data.message || defaultMessage
  }

  return data
}
